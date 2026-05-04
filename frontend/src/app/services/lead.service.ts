import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class LeadService {
  private apiUrl = `${environment.apiUrl}/api/leads`;

  constructor(private http: HttpClient) {}

  submitLead(data: any): Observable<any> {
    return this.http.post(this.apiUrl, data);
  }
}
