<%@ page import="java.sql.*" %>
<%
    String name = request.getParameter("name");
    String q1 = request.getParameter("q1");
    String q2 = request.getParameter("q2");

    // Scoring
    int score = 0;
    if ("4".equals(q1)) score++;
    if ("Paris".equalsIgnoreCase(q2)) score++;

    // Store in DB
    try {
        Class.forName("com.mysql.jdbc.Driver");
        Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/test", "root", "");
        PreparedStatement ps = con.prepareStatement("INSERT INTO exam_results (name, score) VALUES (?, ?)");
        ps.setString(1, name);
        ps.setInt(2, score);
        ps.executeUpdate();
        out.println("<h2>Thank you, " + name + ". You scored: " + score + "/2</h2>");
    } catch (Exception e) {
        out.println("Error: " + e.getMessage());
    }
%>
