/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import Classes.Extractor;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;

/**
 *
 * @author USAURIO
 */
public class BookingTableModel extends AbstractTableModel{
    private Model model = new Model();
    private ArrayList<Extractor> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID", "DATE", "EMAIL"};


    public BookingTableModel() {
        //datuak = model.showUsers();
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
                return datuak.get(row).getDate();
            case 2:
                return datuak.get(row).getEmail();            
            default:
                return null;
        }
    }
}
