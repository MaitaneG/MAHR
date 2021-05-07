/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import Classes.Accounts;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;
   
/**
 *
 * @author gallastegui.maitane 
 */
public class AccountTableModel extends AbstractTableModel {

    private Model model = new Model();
    private ArrayList<Accounts> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID", "PAYER", "COLLECTOR", "DATE", "AMOUNT", "TOTAL"};
    
    public AccountTableModel() {
       datuak.add(new Accounts(1,"","","2013-3-2",2,2));
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
                return datuak.get(row).getId();
            case 1:
                return datuak.get(row).getPayer();
            case 2:
                return datuak.get(row).getCollector();
            case 3:
                return datuak.get(row).getDate();
            case 4:
                return datuak.get(row).getAmount();
            case 5:
                return datuak.get(row).getTotal();
            default:
                return null;
        }
    }
}
