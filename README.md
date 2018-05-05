# WooChef: Migration

![screen shot 2561-05-06 at 00 37 46](https://user-images.githubusercontent.com/2154669/39665924-c48f4f34-50c5-11e8-9d7a-fd0d0e0d476f.png)

Although this is still just an under-development project.  
However conceptually, this is an imitated of Laravel migration feature, with a proper user-interface. That would tremendously change your game of WordPress database migration process.

For example, as a plugin developer, you can easily create your own migration file at `your-plugin/db/migrations/your-migration-file.php` with the code that look something like below:
```php
// wp-content/plugins/your-plugin/db/migrations/1525540442qaz12swxdce3-initial.php

class WCMigration_Migrate_Initial extends WCMigration {
    public function up() {
        WCMigration_Table::create( 'wcmigration_logs', function( WCMigration_Schema $table ) {
            $table->increments( 'id' )->unique();
            $table->string( 'hash', 32 );
            $table->dateTime( 'created_at' );
        });
    }

    public function down() {
        WCMigration_Table::drop( 'wcmigration_logs' );
    }
}
```

Then, go to a database migration page at the WordPress admin dashboard, click `Migrate` button _(see screenshot above)_ and baamm! You have just migrated your new table to a server's database!

Now imagine about your work-flow in the past, how could you live without this, right!? 😁

> ⚠️ Caution, just in case if anyone confuse, this is just still an early-concept.  
> The repository **IS NOT (yet)** ready to be used, unless you want to help me develop, then feel free to clone or fork and submit your pull request back!
