/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import Classes.Container;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;

/**
 *
 * @author gallastegui.maitane
 */
public class CansTableModel extends AbstractTableModel{
    private Model model = new Model();
    private ArrayList<Container> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID", "CAPACITY"};


    public CansTableModel() {
        datuak = model.showContainer();
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
                return datuak.get(row).getCapacity();            
            default:
                return null;
        }
    }
}
