/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import base_classes.Fee;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mvc.Model;

/**
 *
 * @author gallastegui.maitane
 */
public class FeeTableModel extends AbstractTableModel {

    /**
     *
     * The attributes of the class
     */
    private Model model = new Model();
    private ArrayList<Fee> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID FEE", "YEAR", "PAYED", "EMAIL"};

    /**
     *
     * The constructor of the class
     *
     * It is going to save in an ArrayList all the information of the Fees
     */
    public FeeTableModel() {
        datuak = model.showFee();
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
        //For each column
        switch (col) {
            case 0:
                return datuak.get(row).getId();
            case 1:
                return datuak.get(row).getYear();
            case 2:
                return datuak.get(row).isPayed();
            case 3:
                return datuak.get(row).getEmail();
            default:
                return null;
        }
    }
}
