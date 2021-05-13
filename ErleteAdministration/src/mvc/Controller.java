/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import Classes.Container;
import Classes.User;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import tableModels.AccountTableModel;
import tableModels.BookingTableModel;
import tableModels.CansTableModel;
import tableModels.Cans_MergeTableModel;
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

        taulakEguneratu();

        addActionListener(this);
    }

    /**
     * It is going to give an actionListener to each button
     *
     * @param listener
     */
    private void addActionListener(ActionListener listener) {
        view.jButtonSubmitLogin.addActionListener(listener);
        view.jButtonAddMember.addActionListener(listener);
        view.jButtonUpdateMember.addActionListener(listener);
        view.jButtonDeleteMember.addActionListener(listener);
        view.jButtonDeleteBooking.addActionListener(listener);
        view.jButtonAddBin.addActionListener(listener);
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
            case "TAKE":
                takeAllTableInformation();
                break;
            /* When you want to update a member */
            // When you click UPDATE_MEMBER button
            case "UPDATE_MEMBER":
                updateUser();
                break;
            /* When you want to delete a member */
            // When you click DELETE_MEMBER button
            case "DELETE_MEMBER":
                deleteUser();
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
    }

    /**
     * Is to be used by the administrator in order to log in and prove that
     * he/she is the administrator
     */
    public void login() {
        //Gets the information to log in
        String u = view.jTextFieldEmailLogin.getText();
        String p = new String(view.jPasswordFieldPasswordLogin.getPassword());

        ArrayList<User> us = model.showUsers();

        //Proves if the email and password exists and if this person is administrator
        for (int i = 0; i < us.size(); i++) {
            if (u.equalsIgnoreCase(us.get(i).getEmail()) && p.equals(us.get(i).getPassword()) && us.get(i).isType()) {
                view.jDialogMenu.setVisible(true);
                view.jLabelErrorMessage.setText("");
                break;
            } else {
                System.out.println("Venga chaval, buen intento!");
                view.jLabelErrorMessage.setText("Sorry, you cannot enter to the appliacation, because you are not the administrator.");
            }
        }
        //Cleans the information of the labels
        view.jTextFieldEmailLogin.setText("");
        view.jPasswordFieldPasswordLogin.setText("");
    }

    /**
     * Gets all the information entered of the user and calls to a method in
     * order to enter it in the database
     */
    public void enterUser() {
        //Create an object with the information
        User u = new User(view.jTextFieldDni.getText().trim(), view.jTextFieldName.getText().trim(),
                view.jTextFieldSurname.getText().trim(), view.jTextFieldEmailMember.getText().trim(),
                new String(view.jPasswordFieldPassword.getPassword()), view.jTextFieldAccount.getText().trim(),
                view.jRadioButtonAdministrator.isSelected());
        //prove that all the gaps are filled
        if (view.jTextFieldDni.getText().trim().equals("") || view.jTextFieldName.getText().trim().equals("")
                || view.jTextFieldSurname.getText().trim().equals("") || view.jTextFieldEmailMember.getText().trim().equals("")
                || new String(view.jPasswordFieldPassword.getPassword()).equals("")
                || view.jTextFieldAccount.getText().trim().equals("")) {
            view.jLabelErrorMember.setText("You have to fill all the information.");
            //Prove that the user has been added
        } else if (model.addUser(u) == 1) {
            taulakEguneratu();
            view.jLabelErrorMember.setText("");
            //If not added correctly
        } else {
            view.jLabelErrorMember.setText("The member couldn't be added correctly");
        }
        view.jTextFieldDni.setText("");
        view.jTextFieldName.setText("");
        view.jPasswordFieldPassword.setText("");
        view.jTextFieldAccount.setText("");
        view.jRadioButtonAdministrator.setSelected(false);
    }

    public void takeAllTableInformation() {
        int lerroa = view.jTableMember.getSelectedRow();

        if (lerroa != -1) {
            view.jTextFieldDni.setText((String) view.jTableMember.getValueAt(lerroa, 0));
            view.jTextFieldName.setText((String) view.jTableMember.getValueAt(lerroa, 1));
            view.jTextFieldSurname.setText((String) view.jTableMember.getValueAt(lerroa, 2));
            view.jTextFieldEmailMember.setText((String) view.jTableMember.getValueAt(lerroa, 3));
            view.jPasswordFieldPassword.setText((String) view.jTableMember.getValueAt(lerroa, 4));
            view.jTextFieldAccount.setText((String) view.jTableMember.getValueAt(lerroa, 5));
            view.jButtonUpdateMember.setActionCommand("UPDATE_MEMBER");
        } else {
            view.jLabelErrorMember.setText("You have to choose a row");
        }
    }

    /**
     * To update users' information
     *
     * You can change everything instead of email
     */
    public void updateUser() {
        boolean changed = false;
        int lerroa = view.jTableMember.getSelectedRow();
        if (lerroa == -1) {
            view.jLabelErrorMember.setText("You have to choose a row");
        } else {
            String gakoa = (String) view.jTableMember.getValueAt(lerroa, 3);
            String dni = view.jTextFieldDni.getText().trim();
            String name = view.jTextFieldName.getText().trim();
            String surname = view.jTextFieldSurname.getText().trim();
            String password = new String(view.jPasswordFieldPassword.getPassword());
            String account = view.jTextFieldAccount.getText().trim();

            User use = new User(dni, name, surname, view.jTextFieldEmailMember.getText().trim(),
                    password, account, view.jRadioButtonAdministrator.isSelected());

            if (model.updateMember(gakoa, use) == 1) {
                view.jButtonUpdateMember.setActionCommand("TAKE");
                taulakEguneratu();
            } else {
                view.jLabelErrorMember.setText("The member couldn't be updated correctly");
            }
            view.jTextFieldDni.setText("");
            view.jTextFieldName.setText("");
            view.jTextFieldSurname.setText("");
            view.jPasswordFieldPassword.setText("");
            view.jTextFieldEmailMember.setText("");
            view.jTextFieldAccount.setText("");
            view.jRadioButtonAdministrator.setSelected(false);
        }

    }
    
    /**
     * To delete an user
     *
     * You have to select in the table which one do you want to delete
     */
    public void deleteUser() {
        //Gets the selected row
        int lerroa = view.jTableMember.getSelectedRow();
        String gakoa = "";

        //If any row hasn't been selected
        if (view.jTableMember.getSelectedRow() == -1) {
            view.jLabelErrorMember.setText("You have to choose a row");
            //If a row has been selected
        } else {
            gakoa = (String) view.jTableMember.getValueAt(lerroa, 3);
            //If it has been deleted successfully
            if (model.deleteMember(gakoa) == 1) {
                view.jLabelErrorMember.setText("");
                taulakEguneratu();
                //Not deleted successfully
            } else {
                view.jLabelErrorMember.setText("The member couldn't be deleted correctly");
            }
        }
    }

    /**
     * To delete a booking
     *
     * You have to select in the table which one do yo want to delete.
     */
    public void deleteBooking() {
        //Gets the selected row
        int lerroa = view.jTableBooking.getSelectedRow();
        int gakoa = 0;

        //If any row hasn't been selected
        if (view.jTableMember.getSelectedRow() == -1) {
            view.jLabelErrorBooking.setText("You have to choose a row");
            //If a row has been selected
        } else {
            gakoa = (Integer) view.jTableBooking.getValueAt(lerroa, 0);
            //If it has been deleted successfully
            if (model.deleteBooking(gakoa) == 1) {
                view.jLabelErrorBooking.setText("");
                taulakEguneratu();
                //Not deleted successfully
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

        //prove that all the gaps are filled
        if (view.jTextFieldIdBin.getText().trim().equals("") || view.jTextFieldCapacity.getText().trim().equals("")) {
            view.jLabelErrorBin.setText("You have to fill all the information.");
            //Prove that the bin has been added
        } else {
            Container u = new Container(Integer.parseInt(view.jTextFieldIdBin.getText().trim()), Integer.parseInt(view.jTextFieldCapacity.getText().trim()));
            if (model.addContainer(u) == 1) {
                taulakEguneratu();
                view.jLabelErrorBin.setText("");
                //If not added correctly
            } else {
                view.jLabelErrorBin.setText("The can couldn't be added correctly");
            }
            view.jTextFieldIdBin.setText("");
            view.jTextFieldCapacity.setText("");
        }
    }
}
