/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import Classes.Accounts;
import Classes.Extractor;
import Classes.User;
import Classes.Container_Merge;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;
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
            conn = DriverManager.getConnection("jdbc:mariadb://localhost/erlete", "root", "");
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
     * Is going to add users to the database
     *
     * @param u
     * @return 0 if it hadn't been added correctly and 1 if it had been added
     * correctly
     */
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

    /**
     * Is going to update a user' DNI depending on the email
     *
     * @param gakoa
     * @param uDni
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
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

    /**
     * Is going to update a user' name depending on the email
     *
     * @param gakoa
     * @param uName
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
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

    /**
     * Is going to update a user' surname depending on the email
     *
     * @param gakoa
     * @param uSurname
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
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

    /**
     * Is going to update a user' password depending on the email
     *
     * @param gakoa
     * @param uPassword
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
    public int updateMemberPassword(String gakoa, String uPassword) {
        String sql = "UPDATE members "
                + "SET password = ?"
                + "WHERE mail = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, uPassword);
            pstmt.setString(2, gakoa);
            return pstmt.executeUpdate();
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }

    /**
     * Is going to update a user' bank account number depending on the email
     *
     * @param gakoa
     * @param uAccount
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
    public int updateMemberAccount(String gakoa, String uAccount) {
        String sql = "UPDATE members "
                + "SET account = ?"
                + "WHERE mail = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, uAccount);
            pstmt.setString(2, gakoa);
            return pstmt.executeUpdate();
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }

    /**
     * Is going to delete a user depending on the email
     *
     * @param u
     * @return 0 if it hadn't been deleted correctly and 1 if it had been
     * deleted correctly
     */
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

    /**
     * Is going to delete a user depending on the email
     *
     * @param b
     * @return 0 if it hadn't been deleted correctly and 1 if it had been
     * deleted correctly
     *
     */
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

    /**
     * Gets all the information of the the containers and if they have been used
     * or not, and if they have been used who has used it from the database
     *
     * @return an ArrayList of Container_Merge
     */
    public ArrayList<Container_Merge> showContainer_Merge() {

        ArrayList<Container_Merge> boo = new ArrayList<>();
        String sql = "select cans.ID_CAN, capacity, mail, date, date2 from cans left join using_cans2 ON cans.ID_CAN = using_cans2.ID_CAN where date is null or curdate() BETWEEN date and date2 order by cans.ID_CAN";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                if (rs.getString("mail") == null) {
                    Container_Merge u1 = new Container_Merge(rs.getInt("cans.ID_CAN"), rs.getInt("capacity"));
                    //System.out.println(u1);
                    boo.add(u1);
                } else {
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
