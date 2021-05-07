/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import tableModels.AccountTableModel;

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
                view.jDialog1.setVisible(true);
                break;
        }
    }
    
    public void taulaEguneratuAccount(){
        this.view.jTableAccount.setModel(new AccountTableModel());
    }
}
