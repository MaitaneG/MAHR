
import Classes.User;
import junit.framework.TestCase;
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
public class TestUser extends TestCase {

    User user1;
    User user2;

    /**
     * The constructor of the class
     * 
     * Calls to the initialize method
     */
    public TestUser() {
        setUp();
    }

    /**
     * Initialize the values of two objects
     */
    @Override
    public void setUp() {
        user1 = new User("11111A", "Pepito", "Palotes", "pepipalos@gmail.com", "1234", "12345", false);
        user2 = new User("11111A", "Manu", "Gonzalez", "manugonza@gmail.com", "4321", "54321", false);
    }

    /**
     * Tests if the objects have a correct email or not
     */
    @Test
    public void testCorrectEmail() {
        boolean correct1 = user1.isCorrectEmail(user1.getEmail());
        boolean correct2 = user2.isCorrectEmail(user2.getEmail());
        
        assertEquals(correct1,true);
        assertEquals(correct2,true);
    }
}
