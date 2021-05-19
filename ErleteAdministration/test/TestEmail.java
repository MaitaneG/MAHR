
import information.Accounts;
import information.Container_Merge;
import information.Extractor;
import information.Fee;
import information.User;
import junit.framework.TestCase;
import static junit.framework.TestCase.assertEquals;
import org.junit.Test;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author USAURIO
 */
public class TestEmail extends TestCase {
    /**
     * 
     * The attributes of the class
     */
    User user1;
    Extractor extractor1;
    Accounts account1;
    Container_Merge conMerge1;
    Fee fee1;
    
    /**
     * 
     * The constructor of the class
     */
    public TestEmail() {
        setUp();
    }

    /**
     * Initialize all the objects
     */
    @Override
    public void setUp() {
        user1 = new User("11111A", "Pepito", "Palotes", "pepipalos@gmail.com", "1234", "12345", false, true);
        extractor1 = new Extractor(1, "2021-02-02", "admin@erlete.eus");
        account1 = new Accounts(1, "pepipalos@gmail.com", "admin@erlete.eus", "2021-02-12", 30, 1234);
        conMerge1 = new Container_Merge(1, 150, "2021-02-02", "2021-02-22", "admin@erlete.eus");
        fee1 = new Fee(1,2021,false,"pepipalos@gmail.com");
    }

    /**
     * 
     * Test if the email has a correct format
     */
    @Test
    public void testCorrectEmail() {
        boolean correct1 = user1.isCorrectEmail(user1.getEmail());
        boolean correct2 = extractor1.isCorrectEmail(extractor1.getEmail());
        boolean correct3 = account1.isCorrectEmail(account1.getCollector());
        boolean correct4 = account1.isCorrectEmail(account1.getPayer());
        boolean correct5 = conMerge1.isCorrectEmail(conMerge1.getEmail());
        boolean correct6 = fee1.isCorrectEmail(fee1.getEmail());
        
        assertEquals(correct1, true);
        assertEquals(correct2, true);
        assertEquals(correct3, true);
        assertEquals(correct4, true);
        assertEquals(correct5, true);
        assertEquals(correct6, true);
    }
}
