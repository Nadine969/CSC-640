#!/bin/bash
echo "------------------------------------------"
echo "Testing Student Management API"
echo "------------------------------------------"

BASE_URL="http://localhost:8080/api"

# 1️⃣ GET all students
echo "GET /students"
curl -s $BASE_URL/students.php
echo -e "\n"

# 2️⃣ GET all courses
echo "GET /courses"
curl -s $BASE_URL/courses.php
echo -e "\n"

# 3️⃣ GET all enrollments
echo "GET /enrollments"
curl -s $BASE_URL/enrollments.php
echo -e "\n"

# 4️⃣ POST new student (Bearer required)
echo "POST /students"
curl -s -X POST $BASE_URL/students.php \
  -H "Authorization: Bearer 12345" \
  -H "Content-Type: application/json" \
  -d '{"name":"Test Student","email":"test@nku.edu","major":"CS"}'
echo -e "\n"

# 5️⃣ PUT update student
echo "PUT /students?id=1"
curl -s -X PUT "$BASE_URL/students.php?id=1" \
  -H "Authorization: Bearer 12345" \
  -H "Content-Type: application/json" \
  -d '{"major":"Software Engineering"}'
echo -e "\n"

# 6️⃣ DELETE a student
echo "DELETE /students?id=2"
curl -s -X DELETE "$BASE_URL/students.php?id=2" \
  -H "Authorization: Bearer 12345"
echo -e "\n"

echo "✅ All tests completed."
