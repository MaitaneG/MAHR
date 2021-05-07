/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import Classes.Accounts;
import Classes.User;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;
   
/**
 *
 * @author gallastegui.maitane 
 */
public class MembersTableModel extends AbstractTableModel {

    private Model model = new Model();
    private ArrayList<User> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"DNI", "NAME", "SURNAME", "EMAIL", "PASSWORD", "ACCOUNT","ADMIN"};
    
    public MembersTableModel() {
      datuak = model.showUsers();
    }
    
    @Override
    public Class getColumnClass(int c) {
        return getValueAt(0, c).getClass();
    }
    
    @Override
    public int getColumnCount() {
        return ZUTABEAKIZENAK.length;
    }

    
    @Override
    public String getColumnName(int col) {
        return ZUTABEAKIZENAK[col];
    }

    
    @Override
    public int getRowCount() {
        return datuak.size();
    }
 
    
    @Override
    public Object getValueAt(int row, int col) {
        switch (col) {
            case 0:
                return datuak.get(row).getDni();
            case 1:
                return datuak.get(row).getName();
            case 2:
                return datuak.get(row).getSurname();
            case 3:
                return datuak.get(row).getEmail();
            case 4:
                return datuak.get(row).getPassword();
            case 5:
                return datuak.get(row).getAccount();
            case 6:
                return datuak.get(row).isType();
            default:
                return null;
        }
    }
}
