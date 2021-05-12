/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import Classes.Container_Merge;
import java.time.LocalDate;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;

/**
 *
 * @author moreno.manuel
 */
public class Cans_MergeTableModel extends AbstractTableModel{
    private Model model = new Model();
    private ArrayList<Container_Merge> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID CAN", "CAPACITY","MEMBER", "START DATE", "END DATE"};


    public Cans_MergeTableModel() {
        datuak = model.showContainer_Merge();
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
        
        //LocalDate today = LocalDate.now();        
        //if((today.isAfter(datuak.get(row).getDate()) && today.isBefore(datuak.get(row).getDate2())) || (datuak.get(row).getDate().equals(LocalDate.parse("2001-01-10")))){
        
        switch (col) {
            case 0:
                return datuak.get(row).getId();
            case 1:
                return datuak.get(row).getCapacity();
            case 2:                
                return datuak.get(row).getEmail();                                 
            case 3:
                if(datuak.get(row).getDate().equals(LocalDate.parse("2001-01-10"))){
                   return datuak.get(row).getEmail();
                }else{
                   return datuak.get(row).getDate(); 
                }
            case 4:
                if(datuak.get(row).getDate().equals(LocalDate.parse("2001-01-10"))){
                   return datuak.get(row).getEmail();
                }else{
                   return datuak.get(row).getDate2(); 
                }
            default:
                return null;
        }
    /*}
        return null;*/
    }
}