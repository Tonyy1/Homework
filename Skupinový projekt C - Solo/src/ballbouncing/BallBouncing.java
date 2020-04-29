package ballbouncing;

import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.layout.*;
import javafx.geometry.Bounds;
import javafx.scene.shape.Circle;
import javafx.stage.Stage;
import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
import javafx.util.Duration;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.paint.Color;

/**
 *
 * @author Tonyy (Antonín Vojtěch), plnohodnotná verze
 */
public class BallBouncing extends Application {

    public static Pane canvas;

    // Start aplikace
    @Override
    public void start(Stage stage) {
        // Název aplikace 
        stage.setTitle("Ball Bouncing");

        // Vytvoření kruhu
        Circle circle = new Circle();
        Circle circle2 = new Circle();
        circle.setFill(Color.rgb(52, 174, 235));
        circle2.setFill(Color.rgb(232, 28, 28));

        // Instance pro nastavení náhodné X a Y kruhu
        Decider xPos = new Decider();
        Decider yPos = new Decider();
        Decider xPos2 = new Decider();
        Decider yPos2 = new Decider();

        // Samotné určení X a Y získanými hodnotami (Pro správnou funkčnost aplikace nelze použít setCenterX atd.)
        circle.relocate(xPos.xDecider(), yPos.yDecider());
        circle2.relocate(xPos2.xDecider(), yPos2.yDecider());

        // Rádius kruhu 
        circle.setRadius(20);
        circle2.setRadius(20);

        // Vytvoření "plátna" a scény
        canvas = new Pane();
        Scene scene = new Scene(canvas, 800, 600);

        // Nastavení scény, přidání kruhu do scény
        stage.setScene(scene);
        canvas.getChildren().addAll(circle, circle2);
        stage.setResizable(false);
        stage.show();

        // Cyklus pro celkovou funkčnost
        Timeline cycle = new Timeline(new KeyFrame(Duration.millis(10), new EventHandler<ActionEvent>() {

            // Instance a zavolání na náhodné zvolení znaménka pro směr a rychlost směru
            Decider znamenko = new Decider();
            double dX = znamenko.znamenkoDecider() * 3.5;
            double dY = znamenko.znamenkoDecider() * 3.5;
            double dX2 = znamenko.znamenkoDecider() * 4;
            double dY2 = znamenko.znamenkoDecider() * 4;

            @Override
            public void handle(final ActionEvent t) {
                // Pohyb
                circle.setLayoutX(circle.getLayoutX() + dX);
                circle.setLayoutY(circle.getLayoutY() + dY);
                circle2.setLayoutX(circle2.getLayoutX() + dX2);
                circle2.setLayoutY(circle2.getLayoutY() + dY2);

                // Odrážení od stěn
                Bounds bounds = canvas.getBoundsInLocal();
                double minX = bounds.getMinX() + circle.getRadius();
                double minY = bounds.getMinY() + circle.getRadius();
                double maxX = bounds.getMaxX() - circle.getRadius();
                double maxY = bounds.getMaxY() - circle.getRadius();

                // Kolize kruhů
                if (circle.getBoundsInParent().intersects(circle2.getBoundsInParent())) {
                    dX *= -1;
                    dX2 *= -1;
                    dY *= -1;
                    dY2 *= -1;
                }

                // Odrážení od stěn - kruh 1
                if (circle.getLayoutX() >= maxX) {
                    dX *= -1;
                }
                if (circle.getLayoutX() <= minX) {
                    dX *= -1;
                }
                if (circle.getLayoutY() >= maxY) {
                    dY *= -1;
                }
                if (circle.getLayoutY() <= minY) {
                    dY *= -1;
                }

                // Odrážení od stěn - kruh 2
                if (circle2.getLayoutX() >= maxX) {
                    dX2 *= -1;
                }
                if (circle2.getLayoutX() <= minX) {
                    dX2 *= -1;
                }
                if (circle2.getLayoutY() >= maxY) {
                    dY2 *= -1;
                }
                if (circle2.getLayoutY() <= minY) {
                    dY2 *= -1;
                }

            }

        }
        ));
        // Nastavení počtu cyklů
        cycle.setCycleCount(Timeline.INDEFINITE);

        cycle.play();
    }

    public static void main(String args[]) {
        // launch the application 
        launch(args);
    }
}
