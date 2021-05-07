/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import Classes.Accounts;
import Classes.User;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

/**
 *
 * @author USAURIO
 */
public class Model {
    
    
    public static Connection connect() {
        Connection conn = null;
        try {
            conn = DriverManager.getConnection("jdbc:mariadb://localhost/erlete", "root","");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return conn;
    }
    
    public ArrayList<User> showUsers(){
        
        ArrayList<User> use = new ArrayList<>();
        String sql = "SELECT * FROM Members";

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                User u1 = new User(rs.getString("DNI"),rs.getString("Name"),rs.getString("Surname"),rs.getString("Mail"),rs.getString("Password"),rs.getString("Account"),rs.getBoolean("Admin"));
                use.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return use;
    }
    
    public ArrayList<Accounts> showAccounts(){
        
        ArrayList<Accounts> use = new ArrayList<>();
        String sql = "SELECT * FROM Account";

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Accounts u1 = new Accounts(rs.getInt("ID_Move"),rs.getString("Payer"),rs.getString("Collector"),rs.getString("Date"),rs.getInt("Amount"),rs.getInt("Total"));
                use.add(u1);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return use;
    }
    
    
    
}
