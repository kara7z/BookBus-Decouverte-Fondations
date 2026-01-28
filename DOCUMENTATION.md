## 1) Project Idea
**BookBus** is a simple Moroccan bus ticket booking platform (like marKoub.ma).  
Users can search trips and send a booking request. Admin manages trips and bookings.

---

## 2) Domain Analysis

### 2.1 Booking process (user steps)
1. User searches a trip (from, to, date)
2. User sees the list of trips
3. User opens trip details
4. User logs in / registers
5. User sends a booking request
6. User checks booking status (pending/confirmed/cancelled)

### 2.2 Main entities
- User
- Operator (bus company)
- City
- Route (city → city)
- Trip
- Booking

### 2.3 Admin flow
- Add/edit operators
- Add/edit trips
- View bookings
- Change booking status

---

## 3) MVP (Minimum Features)

### Visitor
- Search trips
- View trip details
- Register / login

### User
- Create booking request
- View my bookings
- Cancel booking request (if pending)

### Admin
- Manage operators (CRUD)
- Manage trips (CRUD)
- Update booking status

> Not in MVP: online payment, seat selection, real-time booking.

---

## 4) Database (ERD) — 6 Tables

### Tables
**users**
- id, name, email, password, role, timestamps

**operators**
- id, name, phone (optional), is_active, timestamps

**cities**
- id, name, timestamps

**routes**
- id, departure_city_id, arrival_city_id, timestamps

**trips**
- id, operator_id, route_id, departure_datetime, price, is_active, timestamps

**bookings**
- id, user_id, trip_id, status (pending/confirmed/cancelled), seats, timestamps
