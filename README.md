**Project Description: TENC**

**Overview:**
TENC is a web application designed to facilitate course enrollment and management for users. It provides essential functionalities such as user registration, course enrollment, password management, and course status monitoring. Built on a robust backend framework with secure authentication mechanisms, TENC ensures a seamless and secure user experience.

**Key Features:**

1. **User Registration and Authentication:**
   - Users can register for an account using a secure registration endpoint (`/register`).
   - Authentication is handled via a login endpoint (`/login`) using credentials securely stored and managed.

2. **Password Management:**
   - Authenticated users can change their passwords using the `/change-password` endpoint, ensuring data security and user control over account access.

3. **User Profile and Management:**
   - Registered users can view their profile details through the `/user` endpoint, providing transparency and accessibility to personal information.

4. **Course Enrollment and Status:**
   - Users can enroll in courses and retrieve detailed course information via the `/get-course-details` endpoint, facilitating informed decisions on educational paths.

5. **Course Status Management:**
   - Administrators or authorized users can manage course statuses dynamically using the `/change-course-status` endpoint, ensuring up-to-date availability and accuracy in course offerings.

**Security Measures:**
- **Authentication Middleware:** Utilizes Sanctum middleware to enforce authentication on sensitive routes, ensuring that only authenticated users can access protected endpoints.
  
**Future Enhancements:**
- **Notification System:** Implement notifications for course updates, password changes, and other critical events.
- **Enhanced User Management:** Incorporate features for user roles, permissions, and profile customization.
- **Analytics and Reporting:** Integrate analytics to track course enrollment trends and user interactions for data-driven decision-making.

**Conclusion:**
TENC is poised to streamline the process of course enrollment and user management, offering a secure, efficient, and user-friendly platform for educational pursuits. With its current features and planned enhancements, TENC aims to provide a comprehensive solution tailored to the needs of both users and administrators in the educational sector.