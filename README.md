# Orizon API

This is a RESTful JSON API built with **Laravel** and **MySQL** to manage sustainable travel. The API was created for the fictional travel agency **Orizon**.

## API Endpoints

All endpoints are prefixed with `/api`.

### Countries

-   `GET /api/paesi` - Get all countries.
-   `GET /api/paesi/{id}` - Get a single country.
-   `POST /api/paesi` - Create a new country.
-   `PUT /api/paesi/{id}` - Update an existing country.
-   `DELETE /api/paesi/{id}` - Delete a country.

### Trips

-   `GET /api/viaggi` - Get all trips.
-   `GET /api/viaggi/{id}` - Get a single trip.
-   `POST /api/viaggi` - Create a new trip.
-   `PUT /api/viaggi/{id}` - Update an existing trip.
-   `DELETE /api/viaggi/{id}` - Delete a trip.

## Filtering Trips

The `GET /api/viaggi` endpoint supports dynamic filtering using the following query parameters:

-   `paese_id[]`: Filter trips by country IDs.
    -   **Example:** `GET /api/viaggi?paese_id[]=5&paese_id[]=6`
-   `posti_disponibili`: Filter trips by a minimum number of available seats.
    -   **Example:** `GET /api/viaggi?posti_disponibili=10`
-   **Combined Filters:**
    -   **Example:** `GET /api/viaggi?paese_id[]=5&paese_id[]=6&posti_disponibili=10`
