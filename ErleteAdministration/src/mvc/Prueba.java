/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mvc;

import base_classes.User;

/**
 *
 * @author gallastegui.maitane
 */
public class Prueba {

    public static void main(String[] args) {
        User user1 = new User("11111A", "Pepito", "Palotes", "pepipalos@gmail.com", "1234", "12345", false, true);
        System.out.println(user1.getMD5(user1.getPassword()));
    }
}
