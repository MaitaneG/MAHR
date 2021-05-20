/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import base_classes.Accounts;
import base_classes.Container;
import base_classes.Extractor;
import base_classes.User;
import base_classes.Container_Merge;
import base_classes.Fee;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.util.ArrayList;

/**
 *
 * This class is going to be used to connect with the database and to
 * get,change, add or delete information of the database
 *
 * @author gallastegui.maitane
 */
public class Model {

    /**
     *
     * Is to connect to the database
     *
     * @return the connection of the database
     */
    public static Connection connect() {
        Connection conn = null;
        try {
            //conn = DriverManager.getConnection("jdbc:mariadb://btkd4fugj67roxefnqpx-mysql.services.clever-cloud.com:3306/btkd4fugj67roxefnqpx", "urojaxibigfd3tey", "ZSy7SoXUJhC4yqyrMokh");
            //conn = DriverManager.getConnection("jdbc:mariadb://10.2.0.190:3306/erlete", "usuario1", "user123");
            conn = DriverManager.getConnection("jdbc:mariadb://localhost:3306/erlete", "root", "");
            conn = DriverManager.getConnection("jdbc:mariadb://btkd4fugj67roxefnqpx-mysql.services.clever-cloud.com:3306/btkd4fugj67roxefnqpx", "urojaxibigfd3tey", "ZSy7SoXUJhC4yqyrMokh");
            //conn = DriverManager.getConnection("jdbc:mariadb://10.2.0.190:3306/erlete", "usuario1", "user123");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return conn;
    }

    /**
     *
     * Gets all the information of the users from the database
     *
     * @return an ArrayList of Users
     */
    public ArrayList<User> showUsers() {

        ArrayList<User> use = new ArrayList<>();
        // Selects all the attributes of members
        String sql = "SELECT * FROM members";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery()) {
            while (rs.next()) {
                User u1 = new User(rs.getString("DNI"), rs.getString("Name"), rs.getString("Surname"), rs.getString("Mail"), rs.getString("Password"), rs.getString("Account"), rs.getBoolean("Admin"), rs.getBoolean("Active"));
                use.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return use;
    }

    /**
     *
     * Is going to add users to the database
     *
     * @param u
     * @return 0 if it hadn't been added correctly and 1 if it had been added
     * correctly
     */
    public int addUser(User u) {
        // Enters into the members table the DNI, name, surname, email, password, 
        // account and it is going to be active and not administrator
        String sql = "INSERT INTO members (dni, name, surname, mail, password, account, admin, active) VALUES (?,?,?,?,?,?,?,?)";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setString(1, u.getDni());
            pstmt.setString(2, u.getName());
            pstmt.setString(3, u.getSurname());
            pstmt.setString(4, u.getEmail());
            pstmt.setString(5, u.getPassword());
            pstmt.setString(6, u.getAccount());
            pstmt.setBoolean(7, u.isAdmin());
            pstmt.setBoolean(8, u.isActive());
            return pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }

    /**
     *
     * Is going to update a user's DNI, name, surname, password and account
     * depending on the email
     *
     * @param key
     * @param u
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
    public int updateMember(String key, User u) {
        // Changes from members table the DNI, name, surname, password, account, 
        //when the mail is in the table
        String sql = "UPDATE members "
                + "SET dni = ?, name = ?, surname = ?, password = ?, account = ? WHERE mail = ?";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, u.getDni());
            pstmt.setString(2, u.getName());
            pstmt.setString(3, u.getSurname());
            pstmt.setString(4, u.getPassword());
            pstmt.setString(5, u.getAccount());
            pstmt.setString(6, key);
            return pstmt.executeUpdate();

        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }

    /**
     *
     * It is going to change if a user is active or not
     *
     * @param gakoa
     * @return 0 if it hadn't been updated correctly and 1 if it had been
     * updated correctly
     */
    public int updateEnable(String gakoa) {
        // Changes from members table if the member is active or not
        // If the user is not admin and is active, the user is going to become no active
        // If the user is not admin and is not active, the user is going to become active
        String sql = "UPDATE members "
                + "SET active = CASE "
                + "WHEN admin = false AND active = true THEN false "
                + "WHEN admin = false AND active = false THEN true "
                + "END "
                + "WHERE mail = ?";

        try (Connection connS = connect();
                PreparedStatement pstmtS = connS.prepareStatement(sql)) {

            pstmtS.setString(1, gakoa);
            return pstmtS.executeUpdate();

        } catch (Exception ex) {
            System.out.println(ex.getMessage());
            return 0;
        }
    }

    /**
     * 
     * Gets all the information of the accounts from the database
     *
     * @return an ArrayList of Accounts
     */
    public ArrayList<Accounts> showAccounts() {

        ArrayList<Accounts> acc = new ArrayList<>();
        // Selects all the attributes of Accounts
        String sql = "SELECT * FROM account";

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
        // Selects all the attributes of Bookings
        String sql = "SELECT * FROM bookings";

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
        // Delete recordings from Bookings when the id_booking is in the table
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
        // Select from cans and using_cans the id_can, mail, date, date2 where 
        // date is null and the current date is between date and date2 and order 
        // all the information by id_can
        String sql = "select cans.ID_CAN, capacity, mail, date, date2 from cans left join using_cans ON cans.ID_CAN = using_cans.ID_CAN where date is null or curdate() BETWEEN date and date2 order by cans.ID_CAN";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                // If mail is null
                if (rs.getString("mail") == null) {
                    Container_Merge u1 = new Container_Merge(rs.getInt("cans.ID_CAN"), rs.getInt("capacity"));
                    boo.add(u1);
                    // If mail is not null
                } else {
                    Container_Merge u1 = new Container_Merge(rs.getInt("cans.ID_CAN"), rs.getInt("capacity"), rs.getString("mail"), rs.getString("date"), rs.getString("date2"));
                    boo.add(u1);
                }
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return boo;
    }

    /**
     * Gets all the information of the the containers from the database
     *
     * @return an ArrayList of Container
     */
    public ArrayList<Container> showContainer() {

        ArrayList<Container> boo = new ArrayList<>();
        // Selects the id_can and capacity from cans
        String sql = "select ID_CAN, capacity from cans";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Container u1 = new Container(rs.getInt("ID_CAN"), rs.getInt("capacity"));
                boo.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return boo;
    }

    /**
     * Is going to add users to the database
     *
     * @param c
     * @param price
     * @return 0 if it hadn't been added correctly and 1 if it had been added
     * correctly
     */
    public int addContainer(Container c, float price) {
        // Insert into cans the id and the capacity
        String sql = "INSERT INTO cans VALUES (?,?,?)";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            pstmt.setInt(1, c.getId());
            pstmt.setInt(2, c.getCapacity());
            pstmt.setFloat(3, price);
            return pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }

    /**
     * Gets all the information of the the Fees from the database
     *
     * @return an ArrayList of Container
     */
    public ArrayList<Fee> showFee() {

        ArrayList<Fee> fe = new ArrayList<>();
        // Selects the id_fee,year, payed and email from fees
        String sql = "select ID_FEE, year, payed, mail from fees";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery(sql)) {
            while (rs.next()) {
                Fee u1 = new Fee(rs.getInt("ID_FEE"), rs.getInt("year"), rs.getBoolean("payed"), rs.getString("mail"));
                fe.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return fe;
    }
}
