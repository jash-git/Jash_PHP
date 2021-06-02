using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using System.Data;
using Finisar.SQLite;//http://einboch.pixnet.net/blog/post/248187728-c%23%E6%93%8D%E4%BD%9Csqlite%E8%B3%87%E6%96%99%E5%BA%AB


namespace SYRIS_Offline
{
    class SQLite
    {
        //--
        //SQLite
        public static String DBpath = System.Windows.Forms.Application.StartupPath + "\\SYRIS_Offline.db";
        public static String StrModifyuid = "";
        public static void initSQLiteDatabase()
        {


            if (!System.IO.File.Exists(DBpath))//偵測不到DB就建立新的
            {
                CreateSQLiteDatabase(DBpath);

                string createtablestring = "CREATE TABLE users (id INTEGER PRIMARY KEY,username TEXT,password TEXT,real_name TEXT,emp_no TEXT,emp_type_id INTEGER,emp_title_id INTEGER,controller_group_id INTEGER,enable INTEGER,gender INTEGER,mobile TEXT,tel TEXT,email TEXT,pic_path TEXT,auth_group_id INTEGER,onboard_date INTEGER,language TEXT,last_login_time INTEGER,last_login_ip TEXT,del INTEGER);";
                CreateSQLiteTable(DBpath, createtablestring);

                createtablestring = "CREATE TABLE user_ext_group (id INTEGER PRIMARY KEY,user_id INTEGER,dept_id INTEGER,tree_level INTEGER);";
                CreateSQLiteTable(DBpath, createtablestring);

                createtablestring = "CREATE TABLE dept (id INTEGER PRIMARY KEY,dep_id INTEGER,dep_name TEXT,dep_desc TEXT,unit INTEGER,tree_level INTEGER);";
                CreateSQLiteTable(DBpath, createtablestring);
            }
        }
        public static SQLiteConnection OpenConn(string Database)//資料庫連線程式
        {
            string cnstr = string.Format("Data Source=" + Database + ";Version=3;New=False;Compress=True;");
            SQLiteConnection icn = new SQLiteConnection();
            icn.ConnectionString = cnstr;
            if (icn.State == ConnectionState.Open) icn.Close();
            icn.Open();
            return icn;
        }
        public static void CreateSQLiteDatabase(string Database)//建立資料庫程式
        {
            string cnstr = string.Format("Data Source=" + Database + ";Version=3;New=True;Compress=True;");
            SQLiteConnection icn = new SQLiteConnection();
            icn.ConnectionString = cnstr;
            icn.Open();
            icn.Close();
        }
        public static void CreateSQLiteTable(string Database, string CreateTableString)//建立資料表程式
        {
            SQLiteConnection icn = OpenConn(Database);
            SQLiteCommand cmd = new SQLiteCommand(CreateTableString, icn);
            SQLiteTransaction mySqlTransaction = icn.BeginTransaction();
            try
            {
                cmd.Transaction = mySqlTransaction;
                cmd.ExecuteNonQuery();
                mySqlTransaction.Commit();
            }
            catch (Exception ex)
            {
                mySqlTransaction.Rollback();
                throw (ex);
            }
            if (icn.State == ConnectionState.Open) icn.Close();
        }
        public static void SQLiteInsertUpdateDelete(string Database, string SqlSelectString)//新增資料程式
        {
            SQLiteConnection icn = OpenConn(Database);
            SQLiteCommand cmd = new SQLiteCommand(SqlSelectString, icn);
            SQLiteTransaction mySqlTransaction = icn.BeginTransaction();
            try
            {
                cmd.Transaction = mySqlTransaction;
                cmd.ExecuteNonQuery();
                mySqlTransaction.Commit();
            }
            catch (Exception ex)
            {
                mySqlTransaction.Rollback();
                throw (ex);
            }
            if (icn.State == ConnectionState.Open) icn.Close();
        }
        public static SQLiteDataReader GetDataReader(string Database, string SQLiteString)//讀取資料程式
        {
            SQLiteConnection icn = OpenConn(Database);
            SQLiteDataAdapter da = new SQLiteDataAdapter(SQLiteString, icn);

            SQLiteCommand sqlite_cmd;
            sqlite_cmd = icn.CreateCommand();// 要下任何命令先取得該連結的執行命令物件
            sqlite_cmd.CommandText = SQLiteString;

            SQLiteDataReader sqlite_datareader = sqlite_cmd.ExecuteReader();// 執行查詢塞入 sqlite_datareader

            return sqlite_datareader;
        }
        public static DataTable GetDataTable(string Database, string SQLiteString)//讀取資料程式
        {
            DataTable myDataTable = new DataTable();
            SQLiteConnection icn = OpenConn(Database);
            SQLiteDataAdapter da = new SQLiteDataAdapter(SQLiteString, icn);
            DataSet ds = new DataSet();
            ds.Clear();
            da.Fill(ds);
            myDataTable = ds.Tables[0];
            if (icn.State == ConnectionState.Open) icn.Close();
            return myDataTable;
        }
        //--
    }
}
