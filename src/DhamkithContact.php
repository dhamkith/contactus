<?php


namespace Dhamkith\Contactus;
use Dhamkith\Contactus\Models\ContactUs;

class DhamkithContact
{
    /**
     * check if dhamkith_contactus config file has been published and set.
     *
     * @return bool
     */
    public function configNotPublished()
    {
        return is_null(config('dhamkith_contactus'));
    }

    /**
     * Get the currently set URL path for the contact us.
     *
     * @return String
     */
    public function path()
    {
        return config('dhamkith_contactus.path', 'dhamkith');
    }

    /**
     * Get the entity's read massages.
     *
     * @return collection
     */
    public function readMassages()
    {
        return ContactUs::all()->whereNotNull('read_at');
    }

    /**
     * Get the entity's unread massages.
     *
     * @return collection
     */
    public function unreadMassages()
    {
        return ContactUs::all()->whereNull('read_at');
    }
    
}