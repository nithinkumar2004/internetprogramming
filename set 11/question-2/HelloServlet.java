import java.io.*;
import jakarta.servlet.*;
import jakarta.servlet.http.*;

public class HelloServlet extends HttpServlet {
    public void doPost(HttpServletRequest req, HttpServletResponse res)
            throws ServletException, IOException {
        res.setContentType("text/html");
        PrintWriter out = res.getWriter();

        String user = req.getParameter("username");
        out.println("<h1>Hello, " + user + "! Welcome to the world of Servlets.</h1>");
    }
}
