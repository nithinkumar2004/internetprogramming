import java.io.*;
import jakarta.servlet.*;
import jakarta.servlet.http.*;

public class LibraryServlet extends HttpServlet {
    public void doPost(HttpServletRequest req, HttpServletResponse res)
            throws ServletException, IOException {
        res.setContentType("text/html");
        PrintWriter out = res.getWriter();

        String name = req.getParameter("name");
        String regno = req.getParameter("regno");

        Cookie c1 = new Cookie("username", name);
        Cookie c2 = new Cookie("regno", regno);
        res.addCookie(c1);
        res.addCookie(c2);

        out.println("<html><body>");
        out.println("<h2>Welcome " + name + "! Your registration is successful.</h2>");
        out.println("</body></html>");
    }
}
