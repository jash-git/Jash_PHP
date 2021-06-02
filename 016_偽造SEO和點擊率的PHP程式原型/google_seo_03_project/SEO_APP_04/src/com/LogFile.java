package com;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
//MVC------->M
import android.os.Environment;


public class LogFile {
	public static void CreateAppFloder(String StrDir) // 建立APP 資料夾
	{
		File sd=Environment.getExternalStorageDirectory(); 
		String path=sd.getPath()+"/"+StrDir; 
		File floder=new File(path); 
		String logpath=sd.getPath()+"/"+StrDir+"/"+StrDir+".log"; 
		File logfile=new File(logpath);
		if(!floder.exists()) 
		{
			floder.mkdir();
		}
		else
		{
			if(logfile.exists())
			{
				logfile.delete();
			}
		}
		
	}	
	public static void WriteData2File(String StrDir,String FileName,String StrMsg)//
	{

		File sd=Environment.getExternalStorageDirectory(); 
		String Dir=StrDir;
		CreateAppFloder(Dir);
		String logpath=sd.getPath()+"/"+Dir+"/"+FileName; 
		try
		{
			FileWriter out = new FileWriter(logpath,true);
			
		    SimpleDateFormat formatter; 
		    formatter = new SimpleDateFormat ("HH:mm:ss"); 
		    Calendar cal = Calendar.getInstance();
		    String ctime = formatter.format(cal.getTime()); 
		    StrMsg=ctime+"_"+StrMsg;
			
		    out.write((StrMsg+"\n"));
			out.close();
		}
		catch(IOException ioe){
			System.out.print(ioe);
		}
	}	
}
