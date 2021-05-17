
import Classes.User;
import junit.framework.TestCase;
import static org.junit.Assert.assertNotEquals;
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
public class TestUser extends TestCase{
    User user1;
    User user2;
    
    public TestUser(){
        setUp();
    }
    
    public void setUp(){
        user1 = new User("11111A","Pepito","Palotes","pepipalos@gmail.com","1234","12345",false);
        user2 = new User("11111A","Manu","Gonzalez","manugonza@gmail.com","4321","54321",false);
    }
    
    @Test
    public void testSameDni(){
        assertNotEquals(user1.getDni(),user2.getDni());
    }
}
