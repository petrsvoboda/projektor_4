SELECT ('SELECT * FROM [' + TABLE_SCHEMA + '].[' + TABLE_NAME + '];
GO
sp_columns ' + TABLE_NAME + ';
GO') as prefix_
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'