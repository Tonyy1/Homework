/*
 * Autor: Antonín Vojtěch
 * 
 */
package ballbouncing;

import java.util.Random;

/**
 *
 * @author Tonyy (Antonín Vojtěch)
 */
class Decider {

    // Náhodně volí znaménka pro směr
    public int znamenkoDecider() {
        Random rand = new Random();
        int number = rand.nextInt(2);

        int mark = 0;

        switch (number) {
            case 0:
                mark = -1;
                break;
            case 1:
                mark = 1;
                break;
        }
        return mark;
    }

    // Generátor x a y souřadnic při startu aplikace, limitováno na 750x550, vrací int. Kruh 1 a 2
    public int xDecider() {

        Random randX = new Random();
        int Xnum = randX.nextInt(750);
        return Xnum;
    }

    public int yDecider() {

        Random randY = new Random();
        int Ynum = randY.nextInt(550);
        return Ynum;
    }

    public int xDecider2() {

        Random randX = new Random();
        int Xnum2 = randX.nextInt(750);
        Xnum2 = 750 - xDecider() + Xnum2;
        return Xnum2;
    }

    public int yDecider2() {

        Random randY = new Random();
        int Ynum2 = randY.nextInt(550);
        Ynum2 = 550 - yDecider() + Ynum2;
        return Ynum2;
    }

}
