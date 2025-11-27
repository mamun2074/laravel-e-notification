<?php

namespace Mamun2074\ENotification\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class Helper
{

    /**
     * This function return any number converte into words
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       08/19/2022
     * Time         14:31:56
     * @param       $number
     * @return      
     */
    public static function convertNumberToWords($number): string
    {
        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $negative = 'negative ';
        $decimal = ' point ';
        $dictionary = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
            1000000000000 => 'trillion',
            1000000000000000 => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );
        if (!is_numeric($number)) {
            return false;
        }
        if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }
        if ($number < 0) {
            return $negative . Self::convertNumberToWords(abs($number));
        }
        $string = $fraction = null;
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int)($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . Self::convertNumberToWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int)($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = Self::convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= Self::convertNumberToWords($remainder);
                }
                break;
        }
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string)$fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        return ucfirst($string);
    }
    #end
    /**
     * This function return any number converte money format
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       08/19/2022
     * Time         14:32:59
     * @param       $number
     * @return      money format
     */
    public static function convertMoneyFormat($number): string
    {
        return number_format((float)$number, env('DECIMAL_DIGIT', 3), '.', '');
    }
    #end

    /**
     * This function return asset with version
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       09/02/2022
     * Time         11:20:50
     * @param       $src,$version
     * @return      
     */
    public static function assetV(string $src): string
    {
        # code... 
        $time = (env('APP_DEBUG') == true) ? strtotime(now()) : env('JS_VERSION', 1);
        $version = '?v=' . $time;
        return asset($src . $version);
    }
    #end

    /**
     * This function build tree
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       07/28/2023
     * Time         12:19:28
     * @param       
     * @return      
     */
    public static function make_tree(array $elements, $parentId = null): array
    {
        $result = [];
        foreach ($elements as $item) {
            if ($item['parent_id'] === $parentId) {
                $children = self::make_tree($elements, $item['id']);

                $node = [
                    "Number" => "borno-{$item['id']}",
                    "Name" => $item['description'],
                    "Children" => $children,
                ];

                $result[] = $node;
            }
        }
        return $result;
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       03/17/2024
     * Time         14:53:51
     * @param       
     * @return      
     */
    public static function getFileName($name, $withExt = 1, $prefix = NULL, $suffix = NULL): string
    {
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $name = preg_replace("/[^a-zA-Z0-9]/", "_", pathinfo($name, PATHINFO_FILENAME));
        $name = $prefix . '_' . $name . '_' . $suffix;
        if ($prefix == NULL) {
            $name = substr($name, -170);
        } else {
            $name = substr($name, 0, 170);
        }
        $name .= ('_' . time());
        if ($withExt) {
            $name .= ('.' . $extension);
        }
        return $name;
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       03/23/2024
     * Time         13:38:05
     * @param       
     * @return      
     */
    public static function deleteFile($path): void
    {
        if ($path == null) {
            return;
        }
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
    #end


    /**
     * This function check file exist or not
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       12/08/2024
     * Time         14:14:42
     * @param       
     * @return      
     */
    public static function fileExist($path): bool
    {

        return file_exists($path);
    }
    #end

    public static function sendJson($statusCode = 200, $success = true, $code = 'A01', $payload = 'Successful!', $type = 'success', $message = 'Successfully')
    {
        return response()->json([
            'success' => $success,
            'code'    => $code,
            'message' => $message,
            'payload' => $payload,
            'type'    => $type
        ], $statusCode);
    }

    /**
     * This function return validation errors
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         10:34:28
     * @param       $errors
     * @return      validation errors
     */
    public static function sendValidationError($errors, $message = 'The given data was invalid.')
    {
        return self::sendJson(422, false, config('rest.response.validation_error.code'), $errors, 'error', $message);
    }
    #end

    /**
     * This function works on Login Required json
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         10:34:28
     * @param       $errors
     * @return      Login Required json
     */
    public static function sendUnauthorizedError($errors, $message = 'Unauthorized Access.')
    {
        $errors = [
            'message' => [$message]
        ];
        return self::sendJson(401, false, config('rest.response.unauthorized.code'), $errors, 'error', $message);
    }
    #end

    /**
     * This function works on Temporary Redirect
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         10:34:28
     * @param       $errors
     * @return      Temporary Redirect
     */
    public static function sendEmailVarifiedError($message = 'Please Verify your email address.')
    {
        $errors = [
            'message' => [$message]
        ];
        return self::sendJson(307, false, config('rest.response.login.verify_email.code'), $errors, 'error', $message);
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       04/23/2022
     * Time         11:47:34
     * @param       
     * @return      
     */
    public static function sendAddSuccess($data, $message = "Successfully Added")
    {
        # code...   
        $payload = [
            'data' => $data
        ];
        return self::sendJson(200, true, config('rest.response.success.code'), $payload, 'success', $message);
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       04/23/2022
     * Time         11:47:34
     * @param       
     * @return      
     */
    public static function sendUpdateSuccess($data, $message = "Successfully Updated")
    {
        # code...   
        $payload = [
            'data' => $data
        ];
        return self::sendJson(200, true, config('rest.response.success.code'), $payload, 'success', $message);
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       04/23/2022
     * Time         11:47:34
     * @param       
     * @return      
     */
    public static function sendDeleteSuccess($data = [])
    {
        $payload = [
            'item' => $data
        ];
        $message = "Successfully deleted";
        return self::sendJson(200, true, config('rest.response.success.code'), $payload, 'success', $message);
    }
    #end

    /**
     * This function returns success message
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         10:45:54
     * @param       $message
     * @return      Success message
     */
    public static function sendSuccess($payload, $message = "Success")
    {
        return self::sendJson(200, true, config('rest.response.success.code'), $payload, 'success', $message);
    }
    #end

    /**
     * This function return invalid message
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         11:09:36
     * @param       $message
     * @return      invalid message
     */
    public static function sendInvalid($message = "Wrong email or password!")
    {
        $payload = [
            'message' => [$message]
        ];
        return self::sendJson(403, false, config('rest.response.login.invalid.code'), $payload, 'error', $message);
    }
    #end

    /**
     * This function  return error
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         11:23:39
     * @param
     * @return
     */
    public static function sendNotFound($message = "Not found. Try another one")
    {
        $payload = [
            'message' => $message
        ];
        return self::sendJson(404, false, config('rest.response.error.code'), $payload, 'error', $message);
    }
    #end

    /**
     * This function  return error
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see
     * @since       01/28/2021
     * Time         11:23:39
     * @param
     * @return
     */
    public static function sendError($message = 'Whoops, looks like something went wrong! Please try again.')
    {
        $payload = [
            'message' => $message
        ];
        return self::sendJson(511, false, config('rest.response.error.code'), $payload, 'error');
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       04/23/2022
     * Time         12:13:25
     * @param       
     * @return      
     */
    public static function sendPermissionError($message = 'Permission denied. Please contact your admin.')
    {
        $payload = [
            'message' => $message
        ];
        return self::sendJson(403, false, config('rest.response.error.code'), $payload, 'error', $message);
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       04/21/2022
     * Time         15:55:00
     * @param       
     * @return      
     */
    public static function isEmail($item)
    {
        # code...
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (preg_match($pattern, $item) === 1) { // Email address
            return true;
        } else {
            return false;
        }
    }
    #end

    /**
     * Use PHP's built-in function to get the number of days in a month 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       01/10/2025
     * Time         00:17:06
     * @param       
     * @return      
     */
    public static function getDaysInMonth($year, $month)
    {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }
    #end


    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       02/19/2025
     * Time         00:15:07
     * @param       
     * @return      
     */
    public static function getTodayInt($data = null): int
    {
        $now = Carbon::now();
        if ($data != null) {
            $now = new Carbon($data);
        }
        $today = $now->toDateString();
        $todayInt = str_replace('-', '', $today);
        return $todayInt;
    }
    #end






}
