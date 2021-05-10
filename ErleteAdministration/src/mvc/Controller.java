/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import Classes.User;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import tableModels.AccountTableModel;
import tableModels.MembersTableModel;

/**
 *
 * @author USAURIO
 */
public class Controller implements ActionListener{

    private Model model;
    private View view;
    
    public Controller(Model model, View view) {
        this.model = model;
        this.view = view;
        
        taulaEguneratuMember();
        taulaEguneratuAccount();
        taulaEguneratuBooking();
                
        addActionListener(this);
    }
    
    private void addActionListener(ActionListener listener) {
        view.jButtonSubmitLogin.addActionListener(listener);
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        
        switch (actionCommand) {
            case "SUBMIT":
                if(Login()){
                    view.jDialogMenu.setVisible(true);
                    view.jLabelErrorMessage.setText("");
                }else{
                    System.out.println("Venga chaval, buen intento!");
                    view.jLabelErrorMessage.setText("Sorry, you cannot enter to the appliacation, because you are not the administrator.");
                }     
                view.jTextFieldEmailLogin.setText("");
                view.jPasswordFieldPasswordLogin.setText("");
                
                break;
        }
    }
    
    public void taulaEguneratuAccount(){
        this.view.jTableAccount.setModel(new AccountTableModel());
    }
    
    public void taulaEguneratuBooking(){
        this.view.jTableBooking.setModel(new BookingTableModel());
    }
    
    public void taulaEguneratuMember(){
        this.view.jTableMember.setModel(new MembersTableModel());
    }
    
    
    public boolean Login(){
        String u = view.jTextFieldEmailLogin.getText();
        String p = new String(view.jPasswordFieldPasswordLogin.getPassword());
        
        ArrayList<User> us = model.showUsers();
        boolean log = false;
        
        for (int i = 0;i < us.size();i++){
            if (u.equalsIgnoreCase(us.get(i).getEmail()) && p.equals(us.get(i).getPassword()) && us.get(i).isType()) {
                log = true;
                break;
            }
            else{
                log = false;
            }
        }
        return log; 
        
    }
}
