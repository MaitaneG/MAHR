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
import classes.Container_Merge;
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

    public int updateMemberDni(String gakoa, String uDni) {
        String sql = "UPDATE members "
                + "SET dni = ?"
                + "WHERE mail = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, uDni);
            pstmt.setString(2, gakoa);
            return pstmt.executeUpdate();
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }
    
    public int updateMemberName(String gakoa, String uName) {
        String sql = "UPDATE members "
                + "SET name = ?"
                + "WHERE mail = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, uName);
            pstmt.setString(2, gakoa);
            return pstmt.executeUpdate();
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }
    
    public int updateMemberSurname(String gakoa, String uSurname) {
        String sql = "UPDATE members "
                + "SET surname = ?"
                + "WHERE mail = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, uSurname);
            pstmt.setString(2, gakoa);
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

    public ArrayList<Container_Merge> showContainer_Merge() {

        ArrayList<Container_Merge> boo = new ArrayList<>();
        String sql = "select cans.ID_CAN, capacity, mail, date, date2 from cans left join using_cans2 ON cans.ID_CAN = using_cans2.ID_CAN where date is null or curdate() BETWEEN date and date2 order by cans.ID_CAN";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                if (rs.getString("mail") == null){
                    Container_Merge u1 = new Container_Merge(rs.getInt("cans.ID_CAN"), rs.getInt("capacity"));
                    //System.out.println(u1);
                    boo.add(u1);
                }else {
                    Container_Merge u1 = new Container_Merge(rs.getInt("cans.ID_CAN"), rs.getInt("capacity"), rs.getString("mail"), rs.getString("date"), rs.getString("date2"));
                    //System.out.println(u1);
                    boo.add(u1);
                }

            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return boo;
    }
}
