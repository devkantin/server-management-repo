# Cloud Support Ansible Collection

A comprehensive set of production-ready Ansible playbooks for daily cloud infrastructure support and management across Windows and Linux servers.

## ��� Project Overview

This collection provides automated playbooks for common cloud support daily activities including:
- System health monitoring
- Patch and update management
- Log analysis and monitoring
- User access auditing
- Service management
- Disk space monitoring
- Security audits
- Network diagnostics
- Event log analysis
- Firewall management

## ��� Project Structure

```
Cloud-Support-Ansible/
├── ansible.cfg                 # Ansible configuration
├── README.md                   # This file
├── inventory/
│   ├── hosts.ini              # Inventory file with host definitions
│   └── group_vars/            # Group-specific variables
├── playbooks/
│   ├── linux/
│   │   ├── 01-system-health-check.yml
│   │   ├── 02-patch-management.yml
│   │   ├── 03-log-analysis.yml
│   │   ├── 04-user-access-audit.yml
│   │   ├── 05-service-management.yml
│   │   ├── 06-disk-space-alert.yml
│   │   ├── 07-security-audit.yml
│   │   └── 08-network-diagnostics.yml
│   ├── windows/
│   │   ├── 01-windows-system-check.yml
│   │   ├── 02-windows-updates.yml
│   │   ├── 03-windows-services.yml
│   │   ├── 04-windows-event-logs.yml
│   │   └── 05-windows-firewall.yml
│   └── cross-platform/
│       └── health-dashboard.yml
├── roles/
│   ├── common/
│   ├── linux/
│   └── windows/
├── group_vars/
├── host_vars/
├── library/                   # Custom Ansible modules
├── plugins/                   # Custom plugins
├── tests/                     # Test playbooks
└── docs/                      # Documentation

```

## ��� Quick Start

### Prerequisites

- Ansible 2.9+ installed
- SSH access to Linux servers with Python 3
- PowerShell Remoting (WinRM) configured on Windows servers
- Appropriate network connectivity

### Installation

```bash
# Clone the repository
git clone <repo-url>
cd Cloud-Support-Ansible

# Create Python virtual environment (optional)
python3 -m venv venv
source venv/bin/activate

# Install Ansible
pip install -r requirements.txt
```

### Configuration

1. **Update inventory file** (`inventory/hosts.ini`):
```ini
[linux_servers]
linux-server-01 ansible_host=10.0.1.10 ansible_user=admin

[windows_servers]
windows-server-01 ansible_host=10.0.2.10 ansible_user=Administrator
```

2. **Configure group variables** (`group_vars/all.yml`):
```yaml
environment: production
monitoring_enabled: true
```

## ��� Linux Playbooks

### 1. System Health Check (`01-system-health-check.yml`)
Comprehensive system health monitoring including CPU, memory, disk usage, load average, and process information.

**Usage:**
```bash
ansible-playbook playbooks/linux/01-system-health-check.yml
```

**Monitors:**
- CPU usage with threshold alerts
- Memory usage with threshold alerts
- Disk space per partition with threshold alerts
- System load average
- Top processes by memory
- System uptime and kernel information

---

### 2. Patch Management (`02-patch-management.yml`)
Check for available updates and security patches.

**Usage:**
```bash
ansible-playbook playbooks/linux/02-patch-management.yml
```

**Features:**
- Lists available security updates
- Checks for held packages
- Shows kernel version and update status
- Identifies critical patches

---

### 3. Log Analysis (`03-log-analysis.yml`)
Analyzes system logs for errors, failures, and OOM events.

**Usage:**
```bash
ansible-playbook playbooks/linux/03-log-analysis.yml
```

**Reports:**
- Recent errors and critical events
- Failed login attempts
- Out-of-memory killer events
- Log file sizes and rotation status

---

### 4. User Access Audit (`04-user-access-audit.yml`)
Comprehensive user and access management audit.

**Usage:**
```bash
ansible-playbook playbooks/linux/04-user-access-audit.yml
```

**Checks:**
- Active user sessions
- System users and their UIDs
- Sudo privileged users
- Password policy review
- Accounts with no password
- Failed SSH attempts
- SSH key-based authentication users

---

### 5. Service Management (`05-service-management.yml`)
Monitor and report on systemd services.

**Usage:**
```bash
ansible-playbook playbooks/linux/05-service-management.yml
```

**Monitors:**
- Running services status
- Failed services
- Enabled services
- Critical service health (SSH, MySQL, PostgreSQL, Docker)
- Listening ports and services

---

### 6. Disk Space Alerts (`06-disk-space-alert.yml`)
Monitor disk and inode usage with alerts.

**Usage:**
```bash
ansible-playbook playbooks/linux/06-disk-space-alert.yml
```

**Tracks:**
- Disk usage per partition
- Inode usage
- Top directories by size
- Large log files (>100MB)
- Cache directory sizes

---

### 7. Security Audit (`07-security-audit.yml`)
Security vulnerability scanning and compliance checks.

**Usage:**
```bash
ansible-playbook playbooks/linux/07-security-audit.yml
```

**Checks:**
- Firewall status
- SSH configuration
- SUID binaries
- World-writable files
- Critical file permissions
- SELinux status
- Rootkit detection tools

---

### 8. Network Diagnostics (`08-network-diagnostics.yml`)
Network connectivity and configuration analysis.

**Usage:**
```bash
ansible-playbook playbooks/linux/08-network-diagnostics.yml
```

**Reports:**
- Network interfaces status
- IP addresses and routing
- DNS configuration
- Active connections
- Network statistics

---

## ��� Windows Playbooks

### 1. Windows System Check (`01-windows-system-check.yml`)
Comprehensive Windows system health monitoring.

**Usage:**
```bash
ansible-playbook playbooks/windows/01-windows-system-check.yml
```

**Monitors:**
- System information and OS version
- System uptime
- CPU usage
- Memory usage
- Disk space per drive

---

### 2. Windows Updates (`02-windows-updates.yml`)
Windows update and patch management.

**Usage:**
```bash
ansible-playbook playbooks/windows/02-windows-updates.yml
```

**Checks:**
- Available updates
- Pending reboot status
- Update history
- WSUS configuration

---

### 3. Windows Services (`03-windows-services.yml`)
Windows service monitoring and management.

**Usage:**
```bash
ansible-playbook playbooks/windows/03-windows-services.yml
```

**Reports:**
- Critical services status
- Stopped critical services
- Service count summary
- Disabled services list

---

### 4. Windows Event Logs (`04-windows-event-logs.yml`)
Event log analysis and reporting.

**Usage:**
```bash
ansible-playbook playbooks/windows/04-windows-event-logs.yml
```

**Analyzes:**
- System errors
- System warnings
- Application errors
- Failed login events (Event ID 4625)
- Event log sizes

---

### 5. Windows Firewall (`05-windows-firewall.yml`)
Firewall configuration and rule analysis.

**Usage:**
```bash
ansible-playbook playbooks/windows/05-windows-firewall.yml
```

**Reviews:**
- Firewall profile status
- Firewall rules count
- Disabled rules
- Open ports (listening)

---

## ��� Cross-Platform Playbooks

### Health Dashboard (`health-dashboard.yml`)
Unified health dashboard for all hosts.

**Usage:**
```bash
ansible-playbook playbooks/cross-platform/health-dashboard.yml
```

Displays:
- System information
- Network status
- Hardware specifications
- Connectivity status

---

## ��� Advanced Usage

### Running Specific Plays

```bash
# Run only on Linux servers
ansible-playbook playbooks/linux/01-system-health-check.yml -i inventory/hosts.ini -l linux_servers

# Run only on specific host
ansible-playbook playbooks/windows/01-windows-system-check.yml -i inventory/hosts.ini -l windows-web-01
```

### Dry Run (Check Mode)

```bash
ansible-playbook playbooks/linux/02-patch-management.yml --check
```

### Verbose Output

```bash
# Increase verbosity
ansible-playbook playbooks/linux/01-system-health-check.yml -v    # -v, -vv, -vvv, -vvvv
```

### Custom Inventory

```bash
ansible-playbook playbooks/linux/01-system-health-check.yml -i /path/to/custom/inventory
```

---

## ��� Windows Configuration (WinRM)

### Enable PowerShell Remoting

On Windows hosts, run PowerShell as Administrator:

```powershell
# Enable WinRM
Enable-PSRemoting -Force

# Check status
Test-WSMan

# Configure for Ansible (if needed)
Set-Item -Path WSMan:\localhost\Config\MaxEnvelopeSizeKb -Value 4096
```

### Ansible Windows Configuration

Update `ansible.cfg`:
```ini
[winrm:vars]
ansible_connection=winrm
ansible_winrm_operation_timeout_sec=300
ansible_winrm_read_timeout_sec=600
```

---

## ��� Scheduling

### Cron Job for Daily Linux Health Check

```bash
# Add to crontab
0 6 * * * cd /path/to/Cloud-Support-Ansible && ansible-playbook playbooks/linux/01-system-health-check.yml >> logs/health-check.log 2>&1
```

### Windows Task Scheduler

Create scheduled task to run:
```powershell
$action = New-ScheduledTaskAction -Execute "powershell.exe" -Argument "-NoProfile -ExecutionPolicy Bypass -File C:\Cloud-Support-Ansible\run-health-check.ps1"
$trigger = New-ScheduledTaskTrigger -Daily -At 6:00AM
Register-ScheduledTask -Action $action -Trigger $trigger -TaskName "Ansible-HealthCheck" -Description "Daily Ansible Health Check"
```

---

## ��� Security Best Practices

1. **Credentials Management:**
   - Use Ansible Vault for sensitive credentials
   - Never commit passwords to version control
   - Use SSH keys for Linux authentication
   - Use WinRM with proper authentication

2. **Access Control:**
   - Limit inventory to authorized servers
   - Use appropriate user permissions
   - Enable audit logging

3. **Playbook Security:**
   - Review playbooks before execution
   - Use `--check` mode for dry runs
   - Monitor playbook execution

---

## ��� Logs

Logs are generated in `./logs/` directory:
- `ansible.log` - Main Ansible execution log
- `health-check.log` - Scheduled health check results

---

## ��� Troubleshooting

### SSH Connection Issues
```bash
# Test connectivity
ansible all -i inventory/hosts.ini -m ping

# Debug connection
ansible all -i inventory/hosts.ini -m ping -vvv
```

### Windows WinRM Issues
```bash
# Test WinRM connectivity
ansible all -i inventory/hosts.ini -m win_ping
```

### Python Requirements
```bash
# Install requirements
pip install -r requirements.txt
```

---

## ��� Requirements

```txt
ansible>=2.9.0
jinja2>=2.11
pyyaml>=5.1
```

---

## ��� Contributing

Contributions are welcome! Please:
1. Test playbooks before submitting
2. Document changes
3. Follow existing naming conventions
4. Include error handling

---

## ��� License

MIT License

---

## ��� Support

For issues and questions:
- Check playbook documentation
- Review ansible.log
- Test with --check mode
- Verify inventory configuration

---

## ��� Roadmap

- [ ] Add role-based playbooks
- [ ] Implement monitoring integration
- [ ] Add backup verification playbooks
- [ ] Create incident response playbooks
- [ ] Add cloud provider-specific modules

---

**Last Updated:** April 2026  
**Version:** 1.0.0  
**Maintainer:** Cloud Support Team

