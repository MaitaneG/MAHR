/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package runnable;

import mvc.Controller;
import mvc.Model;
import mvc.View;


public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // Create a view object
        View view = View.showView();
        // Create a model object
        Model model = new Model();
        // Create a controller object
        Controller controller = new Controller(model, view);
        
    }
    
}
