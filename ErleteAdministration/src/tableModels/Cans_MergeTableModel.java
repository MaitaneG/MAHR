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

public class Cans_MergeTableModel extends AbstractTableModel {

    /**
     * 
     * The attributes of the class
     */
    private Model model = new Model();
    private ArrayList<Container_Merge> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID CAN", "CAPACITY", "MEMBER", "START DATE", "END DATE"};

    /**
     * 
     * The constructor of the class
     *
     * It is going to save in an ArrayList all the information of the Containers
     * and who and when they have been used
     */
    public Cans_MergeTableModel() {
        datuak = model.showContainer_Merge();
    }
    
    /**
     * 
     * @param c
     * @return which class the object of that column has
     */
    @Override
    public Class getColumnClass(int c) {
        return getValueAt(0, c).getClass();
    }

    /**
     * 
     * @return how many column the table has
     */
    @Override
    public int getColumnCount() {
        return ZUTABEAKIZENAK.length;
    }

    /**
     * 
     * @param col
     * @return a default name for the column
     */
    @Override
    public String getColumnName(int col) {
        return ZUTABEAKIZENAK[col];
    }
     
    /**
     * 
     * @return how many rows the table has
     */
    @Override
    public int getRowCount() {
        return datuak.size();
    }

    /**
     * 
     * @param row
     * @param col
     * @return the value of which is in the table in certain row and column
     */
    @Override
    public Object getValueAt(int row, int col) {

        //LocalDate today = LocalDate.now();        
        //if((today.isAfter(datuak.get(row).getDate()) && today.isBefore(datuak.get(row).getDate2())) || (datuak.get(row).getDate().equals(LocalDate.parse("2001-01-10")))){
        //For each column
        switch (col) {
            case 0:
                return datuak.get(row).getId();
            case 1:
                return datuak.get(row).getCapacity();
            case 2:
                return datuak.get(row).getEmail();
            case 3:
                //If the date is 2001-01-10 (means that is going to appear null)
                if (datuak.get(row).getDate().equals(LocalDate.parse("2001-01-10"))) {
                    return datuak.get(row).getEmail();
                } else {
                    return datuak.get(row).getDate();
                }
            case 4:
                //If the date is 2001-01-10 (means that is going to appear null)
                if (datuak.get(row).getDate().equals(LocalDate.parse("2001-01-10"))) {
                    return datuak.get(row).getEmail();
                } else {
                    return datuak.get(row).getDate2();
                }
            default:
                return null;
        }
        /*}
        return null;*/
    }
}
