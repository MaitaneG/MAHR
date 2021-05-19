
import base_classes.User;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import junit.framework.TestCase;
import mvc.Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author gallastegui.maitane
 */
public class TestDBConnections extends TestCase {
    Model model;
    
    public TestDBConnections(){
        
    }
    
    public void setUp(){
        
    }
    
    public void testAddUser(){
        User u = new User("11111A", "Pepito", "Palotes", "pepipalos@gmail.com", "1234", "12345", false, true);
        int result = model.addUser(u);
        assertEquals(result, 1);
    }
}
