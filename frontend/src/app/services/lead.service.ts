import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LeadService {
  private apiUrl = '/api/leads';

  constructor(private http: HttpClient) {}

  getAllLeads(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  getLeadById(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}`);
  }

  submitLead(data: any): Observable<any> {
    return this.http.post(this.apiUrl, data);
  }

  updateLead(id: number, data: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/${id}`, data);
  }

  deleteLead(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${id}`);
  }
}
