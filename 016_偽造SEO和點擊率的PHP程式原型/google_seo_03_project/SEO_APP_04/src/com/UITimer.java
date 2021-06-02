package com;
import java.util.Calendar;

import com.example.seo_app.MainActivity;
//MVC------->C
import android.content.Context;
import android.os.Handler;


public class UITimer {
	public Handler m_HandlerTimer;
	public Context m_Context;
	public int m_intID;
	public int m_intSleep;
	public int m_intCount_1;
	public void MainActivity_fun1()
	{
		///*
		MainActivity Ma=(MainActivity)m_Context;
		
        Calendar dt = Calendar.getInstance();
        int thisYear = dt.get(Calendar.YEAR);
        int thisMonth = dt.get(Calendar.MONTH)+1;
        int thisDate = dt.get(Calendar.DAY_OF_MONTH);
        int thisHour = dt.get(Calendar.HOUR_OF_DAY);
        int thisMin = dt.get(Calendar.MINUTE);
        int thisSec = dt.get(Calendar.SECOND);			
        m_intCount_1++;
		String FileName = String.format("%d%02d%02d.log", thisYear,thisMonth,thisDate);
		LogFile.WriteData2File("SEO", FileName, "SEO_Live:"+m_intCount_1+ "\t;finish->"+Ma.m_intSum);
		if(m_intCount_1>3)
		{
			m_intCount_1=0;
			if(Ma.m_intSum==0)
			{
				String url_01 = "http://crazed-it.frog.tw/google_seo/index02.php";//"http://whatsmyuseragent.com/";
				Ma.m_WebView01.loadUrl(url_01);
			}
			else
			{
				Ma.m_intSum=0;
			}
		}
		//*/
		
		SetTimer();		
	}
	private final Runnable TimerRun = new Runnable()
	{
		public void run()
		{
			if(m_intID==0)
			{
				MainActivity_fun1();
			}
		}
	};	
	public void SetTimer()
	{
		m_HandlerTimer.postDelayed(TimerRun, m_intSleep);//啟動Timer
	}
	public UITimer(Context Context,int sleep,int ui)
	{
		m_intID=ui;
		m_Context=Context;
		m_intSleep=sleep;
		m_intCount_1=0;
		m_HandlerTimer=new Handler();
	}
}
