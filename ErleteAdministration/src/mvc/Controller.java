/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import base_classes.Container;
import base_classes.User;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.util.ArrayList;
import tableModels.AccountTableModel;
import tableModels.BookingTableModel;
import tableModels.CansTableModel;
import tableModels.Cans_MergeTableModel;
import tableModels.FeeTableModel;
import tableModels.MembersTableModel;

public class Controller implements ActionListener {

    /**
     * The attributes of Controller
     */
    private Model model;
    private View view;

    /**
     * The constructor of Controller
     *
     * In the constructor the attributes are going to receive a value.
     *
     * Then the values of the tables are going to be generated by calling to
     * some functions.
     *
     * After that it is going to be called to addActionListener()
     *
     * @param model
     * @param view
     */
    public Controller(Model model, View view) {
        this.model = model;
        this.view = view;

        addKeyListener();
        addActionListener(this);
    }

    /**
     * It is going to give an actionListener to each button
     *
     * @param listener
     */
    private void addActionListener(ActionListener listener) {
        // For login
        view.jButtonSubmitLogin.addActionListener(listener);
        // To add member
        view.jButtonAddMember.addActionListener(listener);
        // To update member
        view.jButtonUpdateMember.addActionListener(listener);
        // To delete booking
        view.jButtonDeleteBooking.addActionListener(listener);
        // To add bin
        view.jButtonAddBin.addActionListener(listener);
        // To log out
        view.jButtonLogout1.addActionListener(listener);
        view.jButtonLogout2.addActionListener(listener);
        view.jButtonLogout3.addActionListener(listener);
        view.jButtonLogout4.addActionListener(listener);
        view.jButtonLogout5.addActionListener(listener);
        // To clear the labels of Members' information
        view.jButtonEraser.addActionListener(listener);
        // To clear the labels of bins' information
        view.jButtonEraser2.addActionListener(listener);
        // To enable/ disable user
        view.jButtonMemberEnable.addActionListener(listener);
    }

    /**
     * To give action to the board keys
     */
    private void addKeyListener() {
        /**
         * Create a key listener to jPasswordFieldPasswordLogin
         */
        view.jPasswordFieldPasswordLogin.addKeyListener(new KeyListener() {

            /**
             * When the key is pressed
             */
            @Override
            public void keyPressed(KeyEvent evt) {
                if (evt.getKeyCode() == KeyEvent.VK_ENTER) {
                    login();
                }
            }

            /**
             * When the key is typed
             *
             * Compulsory method (Because it is an interface)
             */
            @Override
            public void keyTyped(KeyEvent e) {

            }

            /**
             * When the key has been released
             *
             * Compulsory method (Because it is an interface)
             */
            @Override
            public void keyReleased(KeyEvent e) {

            }
        });
    }

    /**
     * It is going to say each button what is going to do
     *
     * @param e
     */
    @Override
    public void actionPerformed(ActionEvent e) {

        String actionCommand = e.getActionCommand();

        switch (actionCommand) {
            /* When you want to log in */
            // When you click submit button
            case "SUBMIT":
                login();
                break;
            /* When you want to add a member */
            // When you click ADD_MEMBER button
            case "ADD_MEMBER":
                enterUser();
                break;
            /* When you want to take all the information of members and put it in the labels */
            // When you click ADD_MEMBER button
            case "TAKE":
                takeAllTableInformation();
                break;
            /* When you want to update a member */
            // When you click UPDATE_MEMBER button
            case "UPDATE_MEMBER":
                updateUser();
                break;
            /* When you want to delete a booking */
            // When you click DELETE_BOOKING button
            case "DELETE_BOOKING":
                deleteBooking();
                break;
            /* When you want to add a bin */
            // When you click ADD_BIN button
            case "ADD_BIN":
                enterBin();
                break;
            /* When you want to clear all the information of members labels */
            // When you click ERASER button
            case "ERASER":
                eraser();
                view.jButtonUpdateMember.setActionCommand("TAKE");
                view.jLabelErrorMember.setText("");
                break;
            /* When you want to clear all the information of cans labels */
            // When you click ERASER2 button
            case "ERASER2":
                eraser();
                break;
            /* When you want to enable or disable a user */
            // When you click ENABLE button
            case "ENABLE":
                enable();
                break;
            /* When you want to logout */
            // When you click LOGOUT button
            case "LOGOUT":
                view.jDialogMenu.setVisible(false);
                view.setVisible(true);
                eraser();
                view.jLabelErrorBin.setText("");
                view.jLabelErrorBooking.setText("");
                view.jLabelErrorMember.setText("");
                view.jLabelErrorMessage.setText("");
                break;
        }
    }

    /**
     * To update all the tables' information
     */
    public void taulakEguneratu() {
        this.view.jTableAccount.setModel(new AccountTableModel());
        this.view.jTableBooking.setModel(new BookingTableModel());
        this.view.jTableMember.setModel(new MembersTableModel());
        this.view.jTableMerge.setModel(new Cans_MergeTableModel());
        this.view.jTableBin.setModel(new CansTableModel());
        this.view.jTableAccount1.setModel(new FeeTableModel());
    }

    /**
     * Is to be used by the administrator in order to log in and prove that
     * he/she is the administrator
     */
    public void login() {
        // Gets the information to log in
        String u = view.jTextFieldEmailLogin.getText();
        String p = new String(view.jPasswordFieldPasswordLogin.getPassword());

        // Save in an ArrayList all users' information
        ArrayList<User> us = model.showUsers();

        // Proves if the email and password exists and if this person is administrator
        for (int i = 0; i < us.size(); i++) {
            // If the user exists
            if (u.equalsIgnoreCase(us.get(i).getEmail()) && User.getMD5(p).equals(us.get(i).getPassword())) {
                // If the user is administrator
                if (us.get(i).isAdmin()) {
                    // If the user is active
                    if (us.get(i).isActive()) {
                        taulakEguneratu();
                        view.jDialogMenu.setVisible(true);
                        view.setVisible(false);
                        view.jLabelErrorMessage.setText("");
                        break;
                        // Not active
                    } else {
                        view.jLabelErrorMessage.setText("Sorry, you cannot enter to the application, because your account has been disabled");
                        break;
                    }
                    // Not administrator
                } else {
                    view.jLabelErrorMessage.setText("Sorry, you cannot enter to the application, because you are not the administrator.");
                    break;
                }
                // Not exists
            } else {
                System.out.println("Venga chaval, buen intento!");
                view.jLabelErrorMessage.setText("Sorry, you cannot enter to the appliacation, because you are not part of Erlete.");
            }
        }
        // Clears the information of the labels
        view.jTextFieldEmailLogin.setText("");
        view.jPasswordFieldPasswordLogin.setText("");
    }

    /**
     * Gets all the information entered of the user and calls to a method in
     * order to enter it in the database
     */
    public void enterUser() {

        // Create an object with the information
        User u = new User(view.jTextFieldDni.getText().trim(), view.jTextFieldName.getText().trim(),
                view.jTextFieldSurname.getText().trim(), view.jTextFieldEmailMember.getText().trim(),
                User.getMD5(new String(view.jPasswordFieldPassword.getPassword())), view.jTextFieldAccount.getText().trim(),
                false, true);
        // Prove that all the gaps are filled
        if (view.jTextFieldDni.getText().trim().equals("") || view.jTextFieldName.getText().trim().equals("")
                || view.jTextFieldSurname.getText().trim().equals("") || view.jTextFieldEmailMember.getText().trim().equals("")
                || new String(view.jPasswordFieldPassword.getPassword()).equals("")
                || view.jTextFieldAccount.getText().trim().equals("")) {
            view.jLabelErrorMember.setText("You have to fill all the information.");
            // Prove that the user has been added
        } else if (u.isCorrectEmail(view.jTextFieldEmailMember.getText().trim())) {
            // If added correctly
            if (model.addUser(u) == 1) {
                taulakEguneratu();
                view.jLabelErrorMember.setText("");
                // If not added correctly
            } else {
                view.jLabelErrorMember.setText("The member couldn't be added correctly");
            }
            // Incorrect email
        } else {
            view.jLabelErrorMember.setText("The member couldn't be added correctly, Invalid Email");
        }
        // Clear all the jTextFields
        eraser();
        view.jButtonUpdateMember.setActionCommand("TAKE");
    }

    /**
     * Takes all the information and it puts in the labels
     */
    public void takeAllTableInformation() {
        // Takes the selected row
        int lerroa = view.jTableMember.getSelectedRow();

        // If a row has been selected
        if (lerroa != -1) {
            view.jTextFieldDni.setText((String) view.jTableMember.getValueAt(lerroa, 0));
            view.jTextFieldName.setText((String) view.jTableMember.getValueAt(lerroa, 1));
            view.jTextFieldSurname.setText((String) view.jTableMember.getValueAt(lerroa, 2));
            view.jTextFieldEmailMember.setText((String) view.jTableMember.getValueAt(lerroa, 3));
            view.jPasswordFieldPassword.setText((String) view.jTableMember.getValueAt(lerroa, 4));
            view.jTextFieldAccount.setText((String) view.jTableMember.getValueAt(lerroa, 5));

            // Change the action command to UPDATE_MEMBER
            view.jButtonUpdateMember.setActionCommand("UPDATE_MEMBER");
            // If any row hasn't been selected
        } else {
            view.jLabelErrorMember.setText("You have to choose a row");
        }
    }

    /**
     * To update users' information
     *
     * You can change everything instead of email and admin, and active
     */
    public void updateUser() {
        // Takes the selected row
        int lerroa = view.jTableMember.getSelectedRow();

        // If any row hasn't been selected
        if (lerroa == -1) {
            view.jLabelErrorMember.setText("You have to choose a row");
            // If a row has been selected
        } else {
            String gakoa = (String) view.jTableMember.getValueAt(lerroa, 3);

            User use = new User(view.jTextFieldDni.getText().trim(), view.jTextFieldName.getText().trim(),
                    view.jTextFieldSurname.getText().trim(), view.jTextFieldEmailMember.getText().trim(),
                    new String(view.jPasswordFieldPassword.getPassword()), view.jTextFieldAccount.getText().trim(),
                    false, true);

            if (view.jTextFieldDni.getText().trim().equals("") || view.jTextFieldName.getText().trim().equals("")
                    || view.jTextFieldSurname.getText().trim().equals("") || view.jTextFieldEmailMember.getText().trim().equals("")
                    || new String(view.jPasswordFieldPassword.getPassword()).equals("") || view.jTextFieldAccount.getText().trim().equals("")) {
                view.jLabelErrorMember.setText("You have to fill all the information.");
            } else {
                // If the update has been done correctly
                if (model.updateMember(gakoa, use) == 1) {
                    // Change the action command to TAKE
                    view.jButtonUpdateMember.setActionCommand("TAKE");
                    view.jLabelErrorMember.setText("");
                    taulakEguneratu();
                    // If the update hasn't been done correctly
                } else {
                    view.jLabelErrorMember.setText("The member couldn't be updated correctly");
                }
                eraser();
            }

        }
    }

    public void enable() {
        // Takes the selected row
        int lerroa = view.jTableMember.getSelectedRow();
        // If any row hasn't been selected
        if (lerroa == -1) {
            view.jLabelErrorMember.setText("You have to choose a row");
            // If a row has been selected
        } else {
            String gakoa = (String) view.jTableMember.getValueAt(lerroa, 3);

            // If the update has been done correctly
            if (model.updateEnable(gakoa) == 1) {
                view.jLabelErrorMember.setText("");
                taulakEguneratu();
            } else {
                view.jLabelErrorMember.setText("The member couldn't be updated correctly");
            }
        }
        eraser();
        view.jButtonUpdateMember.setActionCommand("TAKE");
    }

    /**
     * To delete a booking
     *
     * You have to select in the table which one do yo want to delete.
     */
    public void deleteBooking() {
        // Gets the selected row
        int lerroa = view.jTableBooking.getSelectedRow();
        int gakoa;

        // If any row hasn't been selected
        if (view.jTableBooking.getSelectedRow() == -1) {
            view.jLabelErrorBooking.setText("You have to choose a row");
            // If a row has been selected
        } else {
            gakoa = (Integer) view.jTableBooking.getValueAt(lerroa, 0);
            // If it has been deleted successfully
            if (model.deleteBooking(gakoa) == 1) {
                view.jLabelErrorBooking.setText("");
                taulakEguneratu();
                // Not deleted successfully
            } else {
                view.jLabelErrorBooking.setText("The booking couldn't be deleted correctly");
            }
        }
    }

    /**
     * Gets all the information entered of the bin and calls to a method in
     * order to enter it in the database
     */
    public void enterBin() {

        // Not all information filled
        if (view.jTextFieldIdBin.getText().trim().equals("") || view.jTextFieldCapacity.getText().trim().equals("") || view.jTextFieldPrice.getText().trim().equals("")) {
            view.jLabelErrorBin.setText("You have to fill all the information.");
            // All information filled
        } else {
            Container u = new Container(Integer.parseInt(view.jTextFieldIdBin.getText().trim()), Integer.parseInt(view.jTextFieldCapacity.getText().trim()));
            // Prove that the bin has been added
            if (model.addContainer(u, Float.parseFloat(view.jTextFieldPrice.getText().trim())) == 1) {
                taulakEguneratu();
                view.jLabelErrorBin.setText("");
                // If not added correctly
            } else {
                view.jLabelErrorBin.setText("The can couldn't be added correctly");
            }
            view.jTextFieldIdBin.setText("");
            view.jTextFieldCapacity.setText("");
            view.jTextFieldPrice.setText("");
        }
    }

    /**
     * Clear all the jTextFields of members and bins
     */
    public void eraser() {
        // Clears members information
        view.jTextFieldDni.setText("");
        view.jTextFieldName.setText("");
        view.jTextFieldSurname.setText("");
        view.jPasswordFieldPassword.setText("");
        view.jTextFieldEmailMember.setText("");
        view.jTextFieldAccount.setText("");

        // Clears cans information
        view.jTextFieldIdBin.setText("");
        view.jTextFieldCapacity.setText("");
        view.jLabelErrorBin.setText("");
    }
}
