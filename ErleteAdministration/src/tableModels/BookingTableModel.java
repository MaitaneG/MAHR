/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModels;

import Classes.Accounts;
import java.util.ArrayList;
import mvc.Model;

/**
 *
 * @author USAURIO
 */
public class BookingTableModel {
    private Model model = new Model();
    private ArrayList<Accounts> datuak = new ArrayList<>();
    private final String[] ZUTABEAKIZENAK = {"ID", "DATE", "EMAIL"};
}
