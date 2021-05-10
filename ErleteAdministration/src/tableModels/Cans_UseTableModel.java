/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;
import Classes.Container_Use;

/**
 *
 * @author gallastegui.maitane
 */
public class Cans_UseTableModel extends AbstractTableModel{
    private Model model = new Model();
    private ArrayList<Container_Use> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"MAIL", "CAN'S ID", "START DATE", "END DATE"};


    public Cans_UseTableModel() {
        datuak = model.showContainer_Use();
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
                return datuak.get(row).getEmail();
            case 1:
                return datuak.get(row).getContainer();
            case 2:
                return datuak.get(row).getDate();
            case 3:
                return datuak.get(row).getDate().plusDays(20);
            default:
                return null;
        }
    }
}
