/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import Classes.Accounts;
import Classes.Container;
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

    public int addUser(User u) {
        String sql = "INSERT INTO members VALUES (?,?,?,?,?,?,?)";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setString(1, u.getDni());
            pstmt.setString(2, u.getName());
            pstmt.setString(3, u.getSurname());
            pstmt.setString(4, u.getEmail());
            pstmt.setString(5, u.getPassword());
            pstmt.setString(6, u.getAccount());
            pstmt.setBoolean(7, u.isType());
            return pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }

    public int updateMember(String uBilatu, User u) {
        String sql = "UPDATE members "
                + "SET dni = ?, name = ?, surname = ?, mail = ?, password = ?, account = ?, admin = ? "
                + "WHERE mail = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, u.getDni());
            pstmt.setString(2, u.getName());
            pstmt.setString(3, u.getSurname());
            pstmt.setString(4, u.getEmail());
            pstmt.setString(5, u.getPassword());
            pstmt.setString(6, u.getAccount());
            pstmt.setBoolean(7, u.isType());
            pstmt.setString(8, uBilatu);
            return pstmt.executeUpdate();
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }

    public int deleteMember(String u) {
        String sql = "DELETE FROM members WHERE mail = ?";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setString(1, u);
            return pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
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

    public int deleteBooking(int b) {
        String sql = "DELETE FROM bookings WHERE id_booking = ?";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, b);
            return pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }

    public ArrayList<Container> showContainer() {

        ArrayList<Container> boo = new ArrayList<>();
        String sql = "SELECT * FROM cans";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Container u1 = new Container(rs.getInt("ID_CAN"), rs.getInt("CAPACITY"));
                boo.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return boo;
    }

    public ArrayList<Container_Use> showContainer_Use() {

        ArrayList<Container_Use> boo = new ArrayList<>();
        String sql = "SELECT * FROM Using_cans";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Container_Use u1 = new Container_Use(rs.getString("mail"), rs.getInt("id_can"), rs.getString("date"));
                boo.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return boo;
    }
}
