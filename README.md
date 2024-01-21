## Package Name: `sm-sandy/api-response`

### Description:

Introducing the **ApiResponse** package - an easy-to-use and powerful solution to format API responses.
Are you tired of spending endless hours formatting API responses? Look no further than the **ApiResponse** package. Our simple yet powerful package streamlines the process, providing you with an easy way to create consistent and well-structured JSON responses for various HTTP status codes. Say goodbye to inconsistent and poorly formatted responses and hello to clarity and maintainability in your API codebase. Don't wait any longer. Try the **ApiResponse** package today and start simplifying your API response formatting process.

### Key Features:

- **Structured Responses:**
  - Easily generate responses for common HTTP status codes (2xx, 4xx, 5xx).
  - Maintain a consistent response structure across your API.
- **Customization:**

  - Customize success responses with data, messages, and status codes.
  - Provide custom error messages for client and server error responses.

- **Default Messages:**
  - Utilize default messages for common scenarios (e.g., "Resource created successfully," "Internal server error").
- **Configurability:**

  - Configure default success and error messages via a configuration file for quick adjustments.

- **JSON Format:**
  - All responses are automatically formatted as JSON, ensuring compatibility with modern API standards.

### Installation:

1. Install the package via Composer:

   ```bash
   composer require sm-sandy/api-response
   ```

## Usage Example :

- **custom:**
  - ApiResponse::custom(data,message,statusCode);
- **success:**

  - ApiResponse::success(data,message);

  ```
    ApiResponse::success();

    // output
       {
        "data":[],
        "message":"The request was successful", //default message
        "status_code":200
       }

    $data = [
        {
        "key": "value"
       }
    ]
    ApiResponse::success($data,"Data get successfully");

      // output
       {
        "data":[{
        "key": "value"
       }],
        "message":"Data get successfully",
        "status_code":200
       }
  ```

- **created:**

  - ApiResponse::created(data,message);

  ```
    ApiResponse::created();

    // output
       {
        "data":[],
        "message":"Resource successfully created", //default message
        "status_code":201
       }

    $data = [
        {
        "key": "value"
       }
    ]
    ApiResponse::created($data,"User created successfully");

      // output
       {
        "data":[{
        "key": "value"
       }],
        "message":"User created successfully",
        "status_code":200
       }
  ```

- **noContent:**

  - ApiResponse::noContent();

  ```
    ApiResponse::noContent();

    // output
     status code 204
     null
  ```

- **badRequest:**

  - ApiResponse::badRequest(message);

  ```
    ApiResponse::badRequest();

    // output
       {
        "message":"Bad request. Please check your request syntax", //default message
        "status_code":400
       }

    ApiResponse::badRequest("Your message");

      // output
       {
        "message":"Your message",
        "status_code":400
       }
  ```

- **unauthorized:**

  - ApiResponse::unauthorized(message);

  ```
    ApiResponse::unauthorized();

    // output
       {
        "message":"Unauthorized. Please provide valid authentication credentials", //default message
        "status_code":400
       }

    ApiResponse::unauthorized("Your message");

      // output
       {
        "message":"Your message",
        "status_code":400
       }
  ```

- **forbidden:**

  - ApiResponse::forbidden(message);

  ```
    ApiResponse::forbidden();

    // output
       {
        "message":"Forbidden. You don't have permission to access this resource", //default message
        "status_code":400
       }

    ApiResponse::forbidden("Your message");

      // output
       {
        "message":"Your message",
        "status_code":400
       }
  ```

- **notFound:**

  - ApiResponse::notFound(message);

  ```
    ApiResponse::notFound();

    // output
       {
        "message":"Resource not found", //default message
        "status_code":400
       }

    ApiResponse::notFound("Your message");

      // output
       {
        "message":"Your message",
        "status_code":400
       }
  ```

- **error:**

  - ApiResponse::error(message);

  ```
    ApiResponse::error();

    // output
       {
        "message":"An error occurred", //default message
        "status_code":400
       }

    ApiResponse::error("Your message");

      // output
       {
        "message":"Your message",
        "status_code":400
       }
  ```

- Example of laravel controller

  ```
  <?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use Sandy\ApiResponse\Facades\ApiResponse;

  class AuthController extends Controller
  {
      public function getUsers()
      {
          try {
              $data = User::get();

              if ($data->isEmpty()) {
                  // If no users found, return an error response
                  return ApiResponse::noContent();
              }

              // If users are found, return a success response
              return ApiResponse::success($data);

          } catch (\Exception $e) {
              // Handle any exceptions or errors that might occur
              return ApiResponse::error($e->getMessage());
          }
      }
  }

  ```

## License

This package is open-source software licensed under the [MIT license](LICENSE).

## Contribution

Contributions are welcome! Please feel free to submit issues or pull requests.

## Author

Md. Sakwat Minar Sandy

## Acknowledgments

Inspired by the need for consistent API responses in Laravel applications.
