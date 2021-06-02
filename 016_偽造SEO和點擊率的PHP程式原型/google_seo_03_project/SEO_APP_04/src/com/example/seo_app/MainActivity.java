package com.example.seo_app;

import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.view.Menu;

import android.webkit.CookieManager;
import android.webkit.CookieSyncManager;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import android.view.KeyEvent;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.res.Configuration;
import android.os.Handler;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.protocol.HTTP;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.LogFile;
import com.UITimer;

import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

public class MainActivity extends Activity {
	public static WebView m_WebView01;
	public boolean m_blnLANDSCAPE;
	public UITimer m_UIT;
	public int m_intSum;
	public NotificationManager notificationManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        
        m_WebView01=(WebView) findViewById(R.id.webView1);
        m_blnLANDSCAPE=false;
        m_intSum=0;
        
		WebSettings webSettings = m_WebView01.getSettings();
		webSettings.setJavaScriptEnabled(true);//允許轉子
		webSettings.setUseWideViewPort(true);
		webSettings.setLoadWithOverviewMode(true);
		webSettings.setSaveFormData(false);
		webSettings.setSavePassword(false);
		webSettings.setSupportZoom(false);
		
		m_WebView01.setWebChromeClient(new WebChromeClient());
		m_WebView01.setWebViewClient(new WebViewClient() {
	        @Override
	        public boolean shouldOverrideUrlLoading(WebView view, String url)
	        {
	        	/*
	        	Log.d( "shouldOverrideUrlLoading url=", "shouldOverrideUrlLoading url="+url);
	        	return false;
	        	*/
	        	//在点击请求的是链接是才会调用，重写此方法返回true表明点击网页里面的链接还是在当前的webview里跳转，不跳到浏览器那边。
	        	view.loadUrl(url);
	            return true;
	        }
	        @Override
	        public boolean shouldOverrideKeyEvent(WebView view, KeyEvent event)
	        {//重写此方法才能够处理在浏览器中的按键事件。
	            return super.shouldOverrideKeyEvent(view, event);
	        }
	        @Override
	        public void onPageFinished(WebView view, String url) {
	        	MainActivity.m_WebView01.setFocusable(true);//給予Focus		
	        	MainActivity.m_WebView01.setFocusableInTouchMode(true);//給予Focus		
	        	MainActivity.m_WebView01.requestFocus();//給予Focus
	        	
	            Calendar dt = Calendar.getInstance();
	            int thisYear = dt.get(Calendar.YEAR);
	            int thisMonth = dt.get(Calendar.MONTH)+1;
	            int thisDate = dt.get(Calendar.DAY_OF_MONTH);
	            int thisHour = dt.get(Calendar.HOUR_OF_DAY);
	            int thisMin = dt.get(Calendar.MINUTE);
	            int thisSec = dt.get(Calendar.SECOND);			
	            m_intSum++;
	    		String FileName = String.format("%d%02d%02d.log", thisYear,thisMonth,thisDate);
	    		LogFile.WriteData2File("SEO", FileName, "onPageFinished:\t"+url);
	        }
	    });
		webSettings.setUserAgentString("MicroMessager");
		String url_01 = "http://crazed-it.frog.tw/google_seo/index02.php";//"http://whatsmyuseragent.com/";
		LogFile.CreateAppFloder("SEO");
		m_UIT=new UITimer((Context)this,60000,0);
		m_UIT.SetTimer();
		m_WebView01.loadUrl(url_01);
    }
	@Override
	public void onConfigurationChanged(Configuration newConfig) {
		//螢幕旋轉不執行onCreate
		/*
		//對應的設定
        <activity
            android:name="com.listensutra.MainActivity"
            android:label="@string/app_name"
            android:configChanges="orientation|keyboardHidden|screenSize">
		 */
	    // TODO Auto-generated method stub
	    super.onConfigurationChanged(newConfig);
	    if (newConfig.orientation == Configuration.ORIENTATION_LANDSCAPE) {
	    	m_blnLANDSCAPE=true;
	    }
	    else {
	    	m_blnLANDSCAPE=false;
	    }
	}
	public boolean onKeyDown(int keyCode, KeyEvent event)
	{
		switch(keyCode)
		{
			case KeyEvent.KEYCODE_BACK://返回
				CloseAlertDialog();//出現詢問是否關閉程式視窗 2015/03/17 finish();//關閉自己
				return true;//不作任何動作
		}
		return super.onKeyDown(keyCode, event);
	}
    protected void onDestroy(){ 
		//真正作用區
		//當呼叫刪除自己之後，CM內的Timer才會被刪除 by jash at 2014/09/04
        super.onDestroy();
        //Kill myself
        android.os.Process.killProcess(android.os.Process.myPid());
    }
    @Override
    protected void onStop()
    {
    	// TODO Auto-generated method stub
    	//背景執行前最後出發的事件
    	super.onStop();
    	cancelNotification();
    	ShowNotification("SEO","顯示畫面");
    }
	public void ShowNotification(String StrTitle,String StrData)
	{
		///Notification_step02
		//http://blog.xuite.net/kaymaner/Android/233387979-%5BAndroid%5D+Notification+%E9%80%9A%E7%9F%A5
		//取得Notification服務

		 //設定當按下這個通知之後要執行的activity
		notificationManager = (NotificationManager)getSystemService(Context.NOTIFICATION_SERVICE);
		if(notificationManager!=null)
		{
			notificationManager.cancelAll();
		}
		Notification nf = new Notification(R.drawable.ic_launcher, StrTitle,System.currentTimeMillis());
		Intent i = new Intent(this, MainActivity.class);
		PendingIntent pi = PendingIntent.getActivity(this, 0, i, 0);
		nf.setLatestEventInfo(this.getApplicationContext(), StrTitle, StrData, pi);
		notificationManager.notify(0, nf);	
	}    
    public void cancelNotification()
    {
    	NotificationManager notificationManager = (NotificationManager) getSystemService(android.content.Context.NOTIFICATION_SERVICE);
        notificationManager.cancel(0);
    }	    
	//關閉程式提示_start
	public void CloseAlertDialog(){
		new AlertDialog.Builder(this)//
		.setTitle("詢問是否要關閉程式...")
		//.setIcon("图示")//
		.setMessage("是否要關閉程式")//
		.setPositiveButton("確定",
		new DialogInterface.OnClickListener()
		{
			@Override
			public void onClick(DialogInterface dialog,int which)
			{
				cancelNotification();
				System.exit(0);//关闭程序语法
				// 或使用Process.killProcess(Process.myPid());
			}
		})//
		.setNeutralButton("不離開", null)//
		.show();		
	}
	//關閉程式提示_start
	///////////////////////////////////	
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
