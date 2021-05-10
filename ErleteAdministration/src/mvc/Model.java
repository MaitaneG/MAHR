/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import Classes.Accounts;
import Classes.Container;
import Classes.Container_Merge;
import Classes.Container_Use;
import Classes.Extractor;
import Classes.User;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.sql.Statement;
import java.util.ArrayList;

/**
 * This class is going to be used to connect with the database and to
 * get,change, add or delete information of the database
 *
 * @author gallastegui.maitane
 */
public class Model {

    /**
     * Is to connect to the database
     *
     * @return the connection of the database
     */
    public static Connection connect() {
        Connection conn = null;
        try {
            conn = DriverManager.getConnection("jdbc:mariadb://172.16.0.160:3306/erlete", "erlete1", "");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return conn;
    }

    /**
     * Gets all the information of the users from the database
     *
     * @return an ArrayList of Users
     */
    public ArrayList<User> showUsers() {

        ArrayList<User> use = new ArrayList<>();
        String sql = "SELECT * FROM Members";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery()) {
            while (rs.next()) {
                User u1 = new User(rs.getString("DNI"), rs.getString("Name"), rs.getString("Surname"), rs.getString("Mail"), rs.getString("Password"), rs.getString("Account"), rs.getBoolean("Admin"));
                use.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return use;
    }

    /**
     * Gets all the information of the accounts from the database
     *
     * @return an ArrayList of Accounts
     */
    public ArrayList<Accounts> showAccounts() {

        ArrayList<Accounts> acc = new ArrayList<>();
        String sql = "SELECT * FROM Account";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Accounts u1 = new Accounts(rs.getInt("ID_Move"), rs.getString("Payer"), rs.getString("Collector"), rs.getString("Date"), rs.getInt("Amount"), rs.getInt("Total"));
                acc.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return acc;
    }

    /**
     * Gets all the information of the accounts from the database
     *
     * @return an ArrayList of Accounts
     */
    public ArrayList<Extractor> showBookings() {

        ArrayList<Extractor> boo = new ArrayList<>();
        String sql = "SELECT * FROM Bookings";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Extractor u1 = new Extractor(rs.getInt("ID_BOOKING"), rs.getString("DATE"), rs.getString("MAIL"));
                boo.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return boo;
    }
    
     public ArrayList<Container_Merge> showContainer_Merge() {

        ArrayList<Container_Merge> co = new ArrayList<>();
        String sql = "SELECT cans.Id_can, cans.capacity, using_cans.mail, using_cans.date FROM Cans LEFT JOIN using_cans ON cans.id_can = using_cans.id_can";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Container_Merge u1 = new Container_Merge(rs.getInt("cans.Id_can"),rs.getInt("capacity"),rs.getString("mail"),rs.getString("date"));
                co.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return co;
    }
}
