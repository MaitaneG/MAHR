
import base_classes.User;
import junit.framework.TestCase;
import mvc.Model;
import org.junit.Test;

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
    /**
     *
     * The attributes of the class
     */
    Model model;
    User u;

    /**
     *
     * The constructor of the class
     */
    public TestDBConnections() {
        setUp();
    }
    
    /**
     * 
     * Initialize all the objects
     */
    public void setUp() {
        model = new Model();
        u = new User("11111A", "Pepito", "Palotes", "pepipalos@gmail.com", "1234", "12345", false, true);
    }
    
    /**
     * 
     * Test if the user has been addeds or not
     */
    @Test
    public void testAddUser() {
        int result1 = model.addUser(u);
        assertEquals(result1, 1);
    }
    
    /**
     *
     * Test if the booking has been deleted or not
     */
    @Test
    public void testDeleteBooking() {
        int gakoa = 1;
        int result2 = model.deleteBooking(gakoa);
        assertEquals(result2,1);
    }
}
