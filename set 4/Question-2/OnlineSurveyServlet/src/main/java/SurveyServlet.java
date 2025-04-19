import java.io.*;
import java.sql.*;
import jakarta.servlet.*;
import jakarta.servlet.http.*;

public class SurveyServlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String name = request.getParameter("name");
        String rating = request.getParameter("rating");
        String feedback = request.getParameter("feedback");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        
        String url = "jdbc:mysql://localhost:3306/surveydb";
        String user = "root";
        String pass = "";

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection(url, user, pass);
            
            String query = "INSERT INTO customers (name, rating, feedback) VALUES (?, ?, ?)";
            PreparedStatement ps = con.prepareStatement(query);
            ps.setString(1, name);
            ps.setString(2, rating);
            ps.setString(3, feedback);
            ps.executeUpdate();

            out.println("<h3>Thank you for your feedback, " + name + "!</h3>");
            con.close();
        } catch (Exception e) {
            out.println("<h3>Error: " + e.getMessage() + "</h3>");
            e.printStackTrace(out);
        }
    }
}
