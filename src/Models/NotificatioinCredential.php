<?php

namespace Mamun2074\ENotification\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class NotificationCredentials extends Model
{
    use HasFactory;
    protected $table = 'e_notification_credentials';
    protected $fillable = [
        'type',
        'title',
        'host',
        'port',
        'username',
        'password',
        'api_key',
        'encryption_type',
        'transport_driver',
        'from_address',
        'from_name',
        'status',
        'created_by_id',
        'updated_by_id'
    ];

    /**
     * This function works for inserting all data at center point
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       11/08/2025
     * Time         20:26:40
     * @param       
     * @return      
     */
    public function insert(array $data = []): void
    {
        self::create($data);
    }
    #end

    /**
     * This function works for update by id
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       11/08/2025
     * Time         20:30:12
     * @param       
     * @return      
     */
    public function updateById(int $id, array $data = []): int
    {
        return self::where('id', $id)->update($data);
    }
    #end

    /**
     * This function delete item by single
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       11/08/2025
     * Time         20:33:54
     * @param       
     * @return      
     */
    public function deleteById(int $id)
    {
        self::where('id', $id)->delete();
    }
    #end

    /**
     * This function works for delete multiple
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       11/08/2025
     * Time         20:33:54
     * @param       
     * @return      
     */
    public function deleteByIds(array $ids = [])
    {
        self::whereIn('id', $ids)->delete();
    }
    #end

    /**
     * This function return get by id
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       11/08/2025
     * Time         20:41:38
     * @param       
     * @return      
     */
    public function getById(int $id): self
    {
        return self::where('id', $id)->first();
    }
    #end

    /**
     * This function 
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       11/08/2025
     * Time         20:43:38
     * @param       
     * @return      
     */
    public function getAll()
    {
        return self::get();
    }
    #end




}
