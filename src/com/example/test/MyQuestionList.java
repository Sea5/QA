package com.example.test;

import java.util.ArrayList;
import java.util.HashMap;

import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.R.string;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;
import android.os.Build;

public class MyQuestionList extends ActionBarActivity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_my_question_list);
		Intent intent = getIntent();
		String usernameString=intent.getStringExtra("us");
		ListView listView=(ListView)findViewById(R.id.listView1);
		ArrayList<HashMap<String, Object>> list=new ArrayList<HashMap<String,Object>>();
		 for(int i=0;i<10;i++)  
	        {  
	            HashMap<String, Object> map = new HashMap<String, Object>();  
	            map.put("questionListName","mylist"+i);//Í¼Ïñ×ÊÔ´µÄID  
	            map.put("rank",i ); 
	            list.add(map);  
	        }  
		 SimpleAdapter listSimpleAdapter=new SimpleAdapter(this, list, R.layout.list, new String[] {"questionListName","rank"} , new int[] {R.id.questionName,R.id.Rank});
		 listView.setAdapter(listSimpleAdapter);
		 listView.setOnItemClickListener(new ItemClickListener());
		if (savedInstanceState == null) {
			getSupportFragmentManager().beginTransaction()
					.add(R.id.container, new PlaceholderFragment()).commit();
		}
	} 
	private final class ItemClickListener implements OnItemClickListener
	{

		@Override
		public void onItemClick(AdapterView<?> parent, View view, int position,
				long id) {
			// TODO Auto-generated method stub
			ListView listView = (ListView) parent;  
	        HashMap<String, Object> data = (HashMap<String, Object>)listView.getItemAtPosition(position);  
	        String personid = data.get("id").toString();  
	        Toast.makeText(getApplicationContext(), personid, Toast.LENGTH_SHORT).show();  
		}
		
	}
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.my_question_list, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}

	/**
	 * A placeholder fragment containing a simple view.
	 */
	public static class PlaceholderFragment extends Fragment {

		public PlaceholderFragment() {
		}

		@Override
		public View onCreateView(LayoutInflater inflater, ViewGroup container,
				Bundle savedInstanceState) {
			View rootView = inflater.inflate(
					R.layout.fragment_my_question_list, container, false);
			return rootView;
		}
	}

}
