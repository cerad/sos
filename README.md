Symfony Standard Edition for Testing
========================

Just an application where I can test out code without impacting anything else.

Test01 Bundle
========================

Shows how to configure one entity manager to use entities stored under different directories.

TODO: Want to implement a phpunit test case which drops then creates the schema

TODO: While we can't query across multiple schemas, this could be used to combine entities from
      From different bundles?  Not sure.  Only have one Proxy directory for all em's.

TODO: See if it is possible to change the table name for a given entity on the fly.  In particular,
      can we add a schema name to it so we can query across schemas without breating the regular
      doctrine:schema commands.


