
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

    Model model;
    User u;

    public TestDBConnections() {

    }

    public void setUp() {
        model = new Model();
        u = new User("11111A", "Pepito", "Palotes", "pepipalos@gmail.com", "1234", "12345", false, true);
    }

    @Test
    public void testAddUser() {
        int result1 = model.addUser(u);
        assertEquals(result1, 1);
    }

    @Test
    public void testDeleteBooking() {
        int gakoa = 1;
        int result2 = model.deleteBooking(gakoa);
        assertEquals(result2,1);
    }
}
