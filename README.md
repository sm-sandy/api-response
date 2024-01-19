## Package Name: `sandy/api-response`

### Description:

The **ApiResponse** package is a simple yet powerful Laravel package designed to streamline the process of formatting API responses. It provides a convenient way to structure and return JSON responses in a consistent format for both success and error scenarios.

### Key Features:

- **Structured Responses:** The package defines a standard structure for API responses, including data, a message, and a status code.
- **Success Responses:** Easily generate success responses with custom data, messages, and status codes.

- **Error Responses:** Handle errors gracefully by generating error responses with customizable error messages and status codes.

- **JSON Format:** All responses are automatically formatted as JSON, ensuring compatibility with modern API standards.

### Installation:

1. Install the package via Composer:

   ```bash
   composer require sm-sandy/api-response
   ```

## Usage Example :

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
                return ApiResponse::error('No users found', 404);
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
