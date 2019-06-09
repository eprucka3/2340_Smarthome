import javax.swing.*;

public class Overview {
    private JButton addNewDeviceButton;
    private JButton delete1;
    private JButton delete2;
    private JButton delete3;
    private JSlider slider1;
    private JSlider slider2;
    private JSlider slider3;
    private JTextField textField1;
    private JTextField textField2;
    private JTextField textField3;
    private JPanel device2;
    private JPanel device3;
    private JPanel device1;
    public JPanel overviewWindow;

    public static void main(String[] args) {
        JFrame frame = new JFrame("Overview");
        frame.setContentPane(new Overview().overviewWindow);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.pack();
        frame.setVisible(true);
    }
}
