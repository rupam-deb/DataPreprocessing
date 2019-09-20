Environment: 

 Develop two python programs in opensource GoogleCoLab
 Source: https://colab.research.google.com/
 
Instructions:

Local weather station dataset:
There are some values that don’t have any values, I put them 0.
Format the date columns with hh:mm

BOM Daily solar radiation dataset:
I have removed the lines after the value bottom of each grid file. The consolidated June and July data is in GIT with folder name Bom.zip. Please unzip it before run.

Environment setup:

I am using open source Google Colab (colab.research.google.com) to write Python code. 

To read the grid files in Python please install these it may be needed: 
pip install gridDataFormats
pip install --upgrade gridDataFormats


Tasks:

There are total five tasks in this challenge. I group these tasks three:

Task One: 
Processing the data
Visualization of data or results
Additional Task – Extra BOM data

Task Two:
Additional Task – Uploading results to a data store

Task Three:
Additional Task – Anomaly detection


Description of Task:

Task One:


The result of processing of extra BOM data for the month of June and July are in Result_processing_BOM_and_WS.csv file. The consolidated June and July data is in GIT with folder name Bom.zip. Please unzip it before run.







Algorithm:

Processing the data:

Do until Step: Read the Grid file one by one from the specific folder
Step: Find the correct location BOM solar radiation data
Step: Read Local weather station data for the same date
Step: Put the processed data into CSV file row
End Do


Visualization the data:

Step: Read CSV file
Step: Visualize by Plot 





Task Two:

I have uploaded the data processing results to the endpoint (attached screenshot).
 

Task Three:


CATCH Runtime Warning: divide by zero encountered in true_divide at Standard Deviation by put them 0.


